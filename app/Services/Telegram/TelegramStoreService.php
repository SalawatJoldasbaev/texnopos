<?php

namespace App\Services\Telegram;

use App\Models\Telegram;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TelegramStoreService extends BaseService
{
    public function execute(array $data): Builder|Model
    {
        return Telegram::query()
            ->create([
                'telegram_id' => $data['user_id'],
                'step' => 'new-user',
                'info' => [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'username' => $data['username'],
                ]
            ]);
    }
}
