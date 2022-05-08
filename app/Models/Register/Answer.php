<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $answer)
 */
class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'is_correct'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}