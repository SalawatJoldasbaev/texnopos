<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperTeacher
 */
class Teacher extends Model
{
    use HasFactory , SoftDeletes;
    

    protected $fillable = [
        'name',
        'image',
        'description'
    ];
}
