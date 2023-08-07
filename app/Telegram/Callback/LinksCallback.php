<?php

namespace App\Telegram\Callback;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class LinksCallback
{
    public function handle(Nutgram $bot): void
    {
        $instagram = env('INSTAGRAM_URL');
        $telegram_channel = env('TELEGRAM_CHANNEL_URL');
        $telegram_group = env('TELEGRAM_GROUP_URL');
        $youtube = env('YOUTUBE_URL');

        $text = "🔗<b>Instagram:</b> <a href='".$instagram."'>@texnopos</a>";
        $text .= "\n🔗<b>Telegram:</b> <a href='".$telegram_channel."'>@texnopos</a>";
        $text .= "\n🔗<b>Telegram group:</b> <a href='".$telegram_group."'>@texnopos_group</a>";
        $text .= "\n🔗<b>YouTube:</b> <a href='".$youtube."'>@texnopos_official</a>";

        $bot->editMessageText(
            text: $text,
            chat_id: $bot->chatId(),
            message_id: $bot->messageId(),
            parse_mode: ParseMode::HTML,
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(text: '🔗 Instagram', url: env('INSTAGRAM_URL')),
                    InlineKeyboardButton::make(text: '🔗 Telegram', url: env('TELEGRAM_CHANNEL_URL')),
                )
                ->addRow(
                    InlineKeyboardButton::make(text: '🔗 Telegram group', url: env('TELEGRAM_GROUP_URL')),
                    InlineKeyboardButton::make(text: '🔗 YouTube', url: env('YOUTUBE_URL')),
                )
                ->addRow(
                    InlineKeyboardButton::make(text: __('telegram.back'), callback_data: 'back'),
                )
        );
    }
}
