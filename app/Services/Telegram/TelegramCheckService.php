<?php

namespace App\Services\Telegram;

use App\Models\Telegram;
use App\Services\BaseService;

class TelegramCheckService extends BaseService
{
    public function execute(int $id): bool
    {
        $user = Telegram::where('telegram_id', $id)->first();
        return false;
    }
}
