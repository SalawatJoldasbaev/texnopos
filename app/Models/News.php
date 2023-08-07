<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperNews
 */
class News extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
