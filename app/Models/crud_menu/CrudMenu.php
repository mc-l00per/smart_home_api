<?php

namespace App\Models\crud_menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $item)
 * @method static select()
 */
class CrudMenu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
