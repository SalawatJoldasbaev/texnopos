<?php

namespace App\Telegram\Callback;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Internal\InputFile;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class CourseCallback
{
    public function handle(Nutgram $bot, $param): void
    {
        $course = Course::find($param);
        $bot->deleteMessage(
            chat_id: $bot->chatId(),
            message_id: $bot->messageId()
        );
        $image = public_path(str_replace(env('APP_URL'), '', $course->image));
        $caption = '🔸 '.$course->name."\n".__('telegram.about_course')." ".$course->description;

        $bot->sendPhoto(
            photo: InputFile::make($image),
            caption: $caption,
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(__('telegram.course_request'), callback_data: 'course_request:'.$param),
                )
                ->addRow(
                    InlineKeyboardButton::make(__('telegram.back'), callback_data: 'courses_back')
                )
        );
    }
}
