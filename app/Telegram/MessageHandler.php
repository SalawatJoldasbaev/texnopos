<?php

namespace App\Telegram;

use App;
use App\Models\Course;
use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardRemove;

class MessageHandler
{
    public function handle(Nutgram $bot): void
    {
        if ($bot->chatId() == env('GROUP_ID')) {
            $replyText = $bot->message()->reply_to_message->text;
            if (str_starts_with($replyText, "🆕 New question")) {
                $data = explode("|", explode("🔒CODE: ", $replyText)[1]);
                $user = app(TelegramService::class)->execute($data[0]);
                App::setLocale($user->lang);
                $bot->sendMessage(
                    text: $bot->message()->text,
                    chat_id: $data[0],
                    reply_to_message_id: $data[1],
                    reply_markup: InlineKeyboardMarkup::make()->addRow(
                        InlineKeyboardButton::make(__('telegram.back'), callback_data: 'back'),
                        InlineKeyboardButton::make(__('telegram.ask_question'), callback_data: 'ask_question'),
                    ),
                );
            }
            return;
        }
        if (__('telegram.back') == $bot->message()->text) {
            $courses = Course::all(['id', 'name']);
            $keyboardArray = [];
            foreach ($courses as $course) {
                $keyboardArray[] = InlineKeyboardButton::make(text: '🔸 '.$course->name,
                    callback_data: 'course:'.$course->id);
            }
            $keyboardArray[] = InlineKeyboardButton::make(text: __('telegram.back'), callback_data: 'back');
            $keyboard = new InlineKeyboardMarkup();
            $keyboard->inline_keyboard = array_chunk($keyboardArray, 2);
            $bot->sendMessage(
                text: 'Removing keyboard...',
                reply_markup: ReplyKeyboardRemove::make(true),
            )?->delete();
            $bot->sendMessage(
                text: __('telegram.start_message'),
                chat_id: $bot->chatId(),
                reply_markup: $keyboard
            );
        }
    }
}