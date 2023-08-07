<?php

namespace App\Telegram\Middleware;

use App;
use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;

class SetLang
{
    public function __invoke(Nutgram $bot, $next): void
    {
        $user = app(TelegramService::class)->execute($bot->chatId());
        App::setLocale($user?->lang);

        $next($bot);
    }
}
