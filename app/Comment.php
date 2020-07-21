<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'comments';
    // protected $appends = ['email', 'phone'];
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'sender', 'date', 'source',
        'comment'
    ];
}
