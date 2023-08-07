<?php

namespace App\Telegram\Conversations;

use App\Services\Telegram\TelegramChangeService;
use App\Services\Telegram\TelegramService;
use App\Telegram\MainMenu;
use Psr\SimpleCache\InvalidArgumentException;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class AskQuestionConversation extends Conversation
{
    /**
     * @throws InvalidArgumentException
     */
    public function start(Nutgram $bot)
    {
        app(TelegramChangeService::class)->execute([
            'user_id' => $bot->userId(),
            'step' => 'question'
        ]);
        $bot->editMessageText(
            text: __('telegram.ask_question_text'),
            chat_id: $bot->chatId(),
            message_id: $bot->messageId(),
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(__('telegram.back'), callback_data: 'back')
                )
        );
        $this->next('secondStep');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function secondStep(Nutgram $bot)
    {
        app(TelegramChangeService::class)->execute([
            'user_id' => $bot->userId(),
            'step' => 'main menu'
        ]);
        $user = app(TelegramService::class)->execute($bot->userId());
        $name = $user->info['username'] ?? 'User';
        $id = $user->telegram_id;
        $text = "🆕 New question\n➖➖➖➖➖➖";
        $text .= "\n👥Name: ".$user->info['first_name']." ".$user->info['last_name'];
        $text .= "\n📱Phone: ".($user->info['phone'] ?? 'no');
        $text .= "\n👥Username: <a href='tg://user?id=".$id."'>$name</a>";
        $text .= "\n💬Message: ".htmlspecialchars($bot->message()->text);
        $text .= "\n➖➖➖➖➖➖";
        $text .= "\n🔒CODE: ".$bot->userId()."|".$bot->messageId();
        $bot->sendMessage(
            text: $text,
            chat_id: env('GROUP_ID'),
            parse_mode: ParseMode::HTML
        );
        $bot->sendMessage(
            text: __('telegram.ask_question_end'),
            reply_markup: app(MainMenu::class)->menu()
        );
        $this->end();
    }
}
