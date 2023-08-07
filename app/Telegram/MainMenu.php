<?php

namespace App\Telegram;

use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class MainMenu
{
    public function menu(): InlineKeyboardMarkup
    {
        return InlineKeyboardMarkup::make()
            ->addRow(
                InlineKeyboardButton::make(__('telegram.courses'), callback_data: 'courses'),
                InlineKeyboardButton::make(__('telegram.address'), callback_data: 'address'),
            )->addRow(
                InlineKeyboardButton::make(__('telegram.ask_question'), callback_data: 'ask_question'),
                InlineKeyboardButton::make(__('telegram.links'), callback_data: 'links'),
            );
    }
}