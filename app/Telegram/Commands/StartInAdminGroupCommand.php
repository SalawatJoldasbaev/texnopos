<?php

namespace App\Telegram\Commands;

use App\Models\CourseRequest;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class StartInAdminGroupCommand
{

    public function execute(Nutgram $bot): void
    {
        $courseRequests = CourseRequest::query()
            ->with('course')
            ->orderBy('id', 'desc')
            ->withTrashed()
            ->paginate(perPage: 3);
        $text = "";

        foreach ($courseRequests as $request) {
            $text .= "\n\n№".$request->id;
            $text .= "\n🟡 Course name: ".$request->course->name;
            $text .= "\n👥 Name: ".$request->name;
            $text .= "\n📱 Phone: ".$request->phone;
            $text .= "\n💬 Message: ".$request->message;
            $text .= "\n⭕️ Status: ".(!is_null($request->deleted_at) ? 'Deleted' : $request->status);
            $text .= "\n📅 Created at: ".$request->created_at?->format('Y-m-d H:i:s');
            $text .= "\n📅 Deleted at: ".$request->deleted_at?->format('Y-m-d H:i:s');
        }
        $next = $courseRequests->currentPage() + 1;
        $bot->sendMessage(
            text: $text,
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(text: "⬅️/1", callback_data: 'current_page'),
                    InlineKeyboardButton::make(
                        text: $courseRequests->currentPage()."/".$courseRequests->lastPage(),
                        callback_data: 'current_page'
                    ),
                    InlineKeyboardButton::make(
                        text: "$next/➡️",
                        callback_data: $courseRequests->currentPage() == $next ? 'current_page' : "page:$next",
                    )
                )
        );
    }
}
