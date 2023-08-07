<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\Telegram\TelegramService;
use Illuminate\Http\Request;
use App\Models\CourseRequest;
use Illuminate\Support\Facades\Http;
use Nutgram\Laravel\Facades\Telegram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class CourseRequestController extends Controller
{
    public function request(Request $request)
    {
        $phone = $request->phone;
        $name = $request->name;
        $message = $request->message;
        $course_id = $request->course_id;

        $courseRequest = CourseRequest::create([
            'course_id' => $course_id,
            'status' => 'unconfirmed',
            'phone' => $phone,
            'name' => $name,
            'message' => $message,
        ]);

        $course = Course::find($course_id);
        $text = "🆕 New request\n➖➖➖➖➖➖\n🟡Course: ".$course->name;
        $text .= "\n👥Name: $name";
        $text .= "\n📱Phone: $phone";
        $text .= "\n💬Message: $message";
        $text .= "\n➖➖➖➖➖➖";

        Telegram::sendMessage(
            text: $text,
            chat_id: env('GROUP_ID'),
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make(text: '✅Confirm', callback_data: 'request_c:'.$courseRequest->id),
                    InlineKeyboardButton::make(text: '🗑Delete', callback_data: 'request_d:'.$courseRequest->id),
                )
        );
        return ResponseController::success();
    }

    public function delete(Request $request, CourseRequest $courseRequest)
    {
        $courseRequest->delete();
        return ResponseController::success();
    }

    public function confirmed(Request $request, CourseRequest $courseRequest)
    {
        $courseRequest->status = 'confirmed';
        $courseRequest->save();
        return ResponseController::success();
    }

    public function history(Request $request)
    {
        $type = $request->type ?? 'all';
        $courseRequests = CourseRequest::query();
        $per_page = $request->per_page ?? 20;
        $courses = Course::withTrashed()->get();

        if ($type == 'confirmed') {
            $courseRequests = $courseRequests->where('status', 'confirmed');
        } elseif ($type == 'unconfirmed') {
            $courseRequests = $courseRequests->where('status', 'unconfirmed');
        } elseif ($type == 'delete') {
            $courseRequests = $courseRequests->onlyTrashed();
        }

        $courseRequests = $courseRequests->orderBy('id', 'desc')->paginate($per_page);
        $final = [
            'page' => $courseRequests->currentPage(),
            'per_page' => $per_page,
            'last_page' => $courseRequests->lastPage(),
            'data' => []
        ];
        foreach ($courseRequests as $courseRequest) {
            $final['data'][] = [
                'id' => $courseRequest->id,
                'course_id' => $courseRequest->course_id,
                'course_name' => $courses->where('id', $courseRequest->course_id)->first()->name,
                'phone' => $courseRequest->phone,
                'name' => $courseRequest->name,
                'message' => $courseRequest->message,
                'status' => $courseRequest->status,
                'created_at' => $courseRequest->created_at->format('Y-m-d H:i:s'),
                'deleted_at' => $courseRequest->deleted_at?->format('Y-m-d H:i:s'),
            ];
        }
        return ResponseController::data($final);
    }
}
