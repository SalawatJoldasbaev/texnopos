<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Callback\AddressCallback;
use App\Telegram\Callback\BackCallback;
use App\Telegram\Callback\CourseCallback;
use App\Telegram\Callback\CourseRequestCallback;
use App\Telegram\Callback\CoursesBackCallback;
use App\Telegram\Callback\CoursesCallback;
use App\Telegram\Callback\LangCallback;
use App\Telegram\Callback\LinksCallback;
use App\Telegram\Callback\PageCallback;
use App\Telegram\Callback\RequestCCallback;
use App\Telegram\Callback\RequestDCallback;
use App\Telegram\Commands\StartCommand;
use App\Telegram\ContactHandler;
use App\Telegram\Conversations\AskQuestionConversation;
use App\Telegram\Conversations\RegisterCourse;
use App\Telegram\MessageHandler;
use App\Telegram\Middleware\SetLang;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\MessageType;

$bot->onText('/id', function (Nutgram $bot) {
    $bot->sendMessage($bot->chatId());
});
$bot->middleware(SetLang::class);
$bot->onCommand('start', StartCommand::class)->description('The start command!');
$bot->onCallbackQueryData('current_page', function (Nutgram $bot) {
    $bot->answerCallbackQuery(
        callback_query_id: $bot->callbackQuery()->id,
        text: 'This is first page or last page',
        show_alert: false
    );
});
$bot->onCallbackQueryData('page:{param}', [PageCallback::class, 'handle']);
$bot->onCallbackQueryData('lang:{param}', [LangCallback::class, 'handle']);
$bot->onCallbackQueryData('courses', [CoursesCallback::class, 'handle']);
$bot->onCallbackQueryData('back', [BackCallback::class, 'handle']);
$bot->onCallbackQueryData('request_c:{param}', [RequestCCallback::class, 'handle']);
$bot->onCallbackQueryData('request_d:{param}', [RequestDCallback::class, 'handle']);
$bot->onCallbackQueryData('course:{param}', [CourseCallback::class, 'handle']);
$bot->onCallbackQueryData('course_request:{param}', [CourseRequestCallback::class, 'handle']);
$bot->onCallbackQueryData('courses_back', [CoursesBackCallback::class, 'handle']);
$bot->onCallbackQueryData('address', [AddressCallback::class, 'handle']);
$bot->onCallbackQueryData('links', [LinksCallback::class, 'handle']);
$bot->onCallbackQueryData('ask_question', AskQuestionConversation::class);
$bot->onMessageType(MessageType::TEXT, [MessageHandler::class, 'handle']);
$bot->onMessageType(MessageType::CONTACT, RegisterCourse::class);
