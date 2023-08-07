<?php

namespace App\Telegram\Callback;

use App\Services\Telegram\TelegramChangeService;
use App\Services\Telegram\TelegramService;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

class CourseRequestCallback
{
    public function handle(Nutgram $bot, $param): void
    {
        $bot->deleteMessage(
            chat_id: $bot->chatId(),
            message_id: $bot->messageId()
        );
        $user = app(TelegramService::class)->execute($bot->userId());
        $info = $user->info;
        $info['course'] = $param;
        app(TelegramChangeService::class)->execute([
            'user_id' => $bot->userId(),
            'step' => 'course',
            'info' => $info
        ]);
        $bot->sendMessage(
            text: __('telegram.send_phone_number'),
            reply_markup: ReplyKeyboardMarkup::make()->addRow(
                KeyboardButton::make(__('telegram.send_phone_button'), request_contact: true),
                KeyboardButton::make(__('telegram.back')),
            ),
        );
    }
}
