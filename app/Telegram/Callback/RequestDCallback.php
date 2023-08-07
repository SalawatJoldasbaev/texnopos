<?php

namespace App\Telegram\Callback;

use App\Models\CourseRequest;
use SergiX44\Nutgram\Nutgram;

class RequestDCallback
{
    public function handle(Nutgram $bot, $param): void
    {
        $request = CourseRequest::find($param);
        $request->delete();

        $bot->deleteMessage(
            chat_id: $bot->chatId(),
            message_id: $bot->messageId()
        );
    }
}
