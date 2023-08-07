<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPortfolio
 */
class Portfolio extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = [
        'type',
        'name',
        'description',
        'image',
        'url'
    ];
}
