<?php

namespace App\Telegram\Callback;

use App\Services\Telegram\TelegramChangeService;
use App\Telegram\MainMenu;
use SergiX44\Nutgram\Nutgram;

class LangCallback
{
    public function handle(Nutgram $bot, $param): void
    {
        app(TelegramChangeService::class)->execute([
            'user_id' => $bot->userId(),
            'lang' => $param
        ]);
        \App::setLocale($param);

        $bot->editMessageText(
            text: __('telegram.start_message'),
            chat_id: $bot->chatId(),
            message_id: $bot->messageId(),
            reply_markup: app(MainMenu::class)->menu()
        );
    }
}
