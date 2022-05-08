<?php

namespace App\Models\Register;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $data)
 */
class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'category',
        'rating',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function answers(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }
}