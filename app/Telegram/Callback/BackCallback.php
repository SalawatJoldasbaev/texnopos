<?php

namespace App\Telegram\Callback;

use App\Services\Telegram\TelegramChangeService;
use App\Telegram\MainMenu;
use SergiX44\Nutgram\Nutgram;

class BackCallback
{
    public function handle(Nutgram $bot): void
    {
        app(TelegramChangeService::class)->execute([
           'user_id'=> $bot->userId(),
            'step'=> 'main menu'
        ]);
        $bot->editMessageText(
            text: __('telegram.start_message'),
            chat_id: $bot->chatId(),
            message_id: $bot->messageId(),
            inline_message_id: $bot->inlineMessageId(),
            reply_markup: app(MainMenu::class)->menu()
        );
    }
}
