<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperEmployee
 */
class Employee extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;
    protected $casts = ['deleted_at'];
    protected $fillable = [
        'name',
        'phone',
        'password'
    ];
}
