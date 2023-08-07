<?php

namespace App\Telegram\Callback;

use App\Models\Course;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class CoursesBackCallback
{
    public function handle(Nutgram $bot): void
    {
        $courses = Course::all(['id', 'name']);
        $keyboardArray = [];
        foreach ($courses as $course) {
            $keyboardArray[] = InlineKeyboardButton::make(text: '🔸 '.$course->name,
                callback_data: 'course:'.$course->id);
        }

        $keyboardArray[] = InlineKeyboardButton::make(text: __('telegram.back'), callback_data: 'back');
        $keyboard = new InlineKeyboardMarkup();
        $keyboard->inline_keyboard = array_chunk($keyboardArray, 2);
        $bot->deleteMessage(
            chat_id: $bot->chatId(),
            message_id: $bot->messageId()
        );
        $bot->sendMessage(
            text: __('telegram.start_message'),
            chat_id: $bot->chatId(),
            reply_markup: $keyboard
        );
    }
}
