<?php

namespace App\Telegram\Commands;

use App\Services\Telegram\TelegramChangeService;
use App\Services\Telegram\TelegramService;
use App\Services\Telegram\TelegramStoreService;
use App\Telegram\MainMenu;
use Exception;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class StartCommand extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Start';

    public function handle(Nutgram $bot): void
    {
        if($bot->chatId() == env('GROUP_ID')){
            app(StartInAdminGroupCommand::class)->execute($bot);
            return;
        }
        $message = "Sálem, tildi saylań.\nSalom, tilni tanlang.\nЗдравствуйте. Пожалуйста, выберите язык.";
        $telegram = app(TelegramService::class)->execute($bot->userId());
        if(!$telegram){
            app(TelegramStoreService::class)->execute([
                'user_id' => $bot->userId(),
                'first_name' => $bot->user()->first_name,
                'last_name' => $bot->user()->last_name,
                'username' => $bot->user()->username
            ]);
        }
        if (!$telegram or is_null($telegram->lang)) {
            $bot->sendMessage(
                text: $message,
                reply_markup: InlineKeyboardMarkup::make()
                    ->addRow(
                        InlineKeyboardButton::make('Qaraqalpaqsha', callback_data: 'lang:kaa'),
                        InlineKeyboardButton::make("O'zbekcha", callback_data: 'lang:uz')
                    )->addRow(
                        InlineKeyboardButton::make('Русский', callback_data: 'lang:ru'),
                    )
            );
        } else {
            app(TelegramChangeService::class)->execute([
                'user_id'=> $bot->userId(),
                'step'=> 'main menu'
            ]);
            $bot->sendMessage(
                text: __('telegram.start_message'),
                reply_markup: app(MainMenu::class)->menu()
            );
        }
    }
}
