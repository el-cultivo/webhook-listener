<?php

namespace App\Models\WebHooks;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'content' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];
}
