<?php

namespace App\Telegram\Callback;

use App\Models\CourseRequest;
use SergiX44\Nutgram\Nutgram;

class RequestCCallback
{
    public function handle(Nutgram $bot, $param): void
    {
        $request = CourseRequest::find($param);
        $request->status = 'confirmed';
        $request->save();

        $bot->deleteMessage(
            chat_id: $bot->chatId(),
            message_id: $bot->messageId()
        );
    }
}
