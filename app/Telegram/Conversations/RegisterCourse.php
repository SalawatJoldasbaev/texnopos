<?php

namespace App\Telegram\Conversations;

use App\Models\Course;
use App\Models\CourseRequest;
use App\Services\Telegram\TelegramChangeService;
use App\Services\Telegram\TelegramService;
use App\Telegram\MainMenu;
use Psr\SimpleCache\InvalidArgumentException;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class RegisterCourse extends Conversation
{
    /**
     * @throws InvalidArgumentException
     */
    public function start(Nutgram $bot)
    {
        $user = app(TelegramService::class)->execute($bot->userId());
        $info = $user->info;
        $info['phone'] = $bot->message()->contact->phone_number;
        app(TelegramChangeService::class)->execute([
            'user_id' => $bot->userId(),
            'info' => $info
        ]);
        $bot->sendMessage(
            text: 'Removing keyboard...',
            reply_markup: ReplyKeyboardRemove::make(true),
        )?->delete();
        $bot->sendMessage(__('telegram.additional_message'));
        $this->next('secondStep');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function secondStep(Nutgram $bot)
    {
        $user = app(TelegramService::class)->execute($bot->userId());
        $name = $user->info['username'] ?? 'User';
        $id = $user->telegram_id;
        $course = Course::find($user->info['course']);
        $text = "🆕 New request\n➖➖➖➖➖➖\n🟡Course: ".$course->name;
        $text .= "\n👥Name: ".$user->info['first_name']." ".$user->info['last_name'];
        $text .= "\n📱Phone: ".$user->info['phone'];
        $text .= "\n👥Username: [$name](tg://user?id=$id)";
        $text .= "\n💬Message: ".$bot->message()->text;
        $text .= "\n➖➖➖➖➖➖";
        $request = CourseRequest::create([
            'course_id' => $course->id,
            'status' => 'unconfirmed',
            'phone' => $user->info['phone'],
            'name' => $name,
            'message' => $bot->message()->text,
        ]);
        $bot->sendMessage(
            text: $text,
            chat_id: env('GROUP_ID'),
            parse_mode: ParseMode::MARKDOWN,
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(text: '✅Confirm', callback_data: 'request_c:'.$request->id),
                    InlineKeyboardButton::make(text: '🗑Delete', callback_data: 'request_d:'.$request->id),
                )
        );
        $bot->sendMessage(
            text: __('telegram.end_message'),
            reply_markup: app(MainMenu::class)->menu(),
        );
        $this->end();
    }
}
