<?php

namespace App\Services\Telegram;

use App\Models\Telegram;
use App\Services\BaseService;

class TelegramService extends BaseService
{
    public function execute(int $id): Telegram|null
    {
        return Telegram::where('telegram_id', $id)->first();
    }
}
