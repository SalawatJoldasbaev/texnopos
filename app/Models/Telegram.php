<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTelegram
 */
class Telegram extends Model
{
    use HasFactory;

    protected $fillable = [
        'telegram_id',
        'lang',
        'step',
        'info',
    ];

    protected $casts = [
        'info' => 'json'
    ];
}
