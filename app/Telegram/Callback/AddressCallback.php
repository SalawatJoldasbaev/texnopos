<?php

namespace App\Telegram\Callback;

use SergiX44\Nutgram\Nutgram;

class AddressCallback
{
    public function handle(Nutgram $bot): void
    {
        $bot->sendVenue(
            latitude: 42.460098,
            longitude: 59.6048881,
            title: 'TexnoPOS Academy',
            address: 'Nukus, Ǵarezsizlik kóshesi 80/4',
        );
    }
}
