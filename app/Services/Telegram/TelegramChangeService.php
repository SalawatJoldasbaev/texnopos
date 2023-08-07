<?php

namespace App\Services\Telegram;

use App\Models\Telegram;
use App\Services\BaseService;

class TelegramChangeService extends BaseService
{
    public function execute(array $data): Telegram
    {
        $telegram = Telegram::where('telegram_id', $data['user_id'])
            ->first();
        if ($telegram) {
            foreach ($data as $key => $value) {
                if ($key == 'user_id') {
                    continue;
                }
                $telegram->{$key} = $value;
            }
            $telegram->save();
        }
        return $telegram;
    }
}
