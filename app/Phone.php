<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['phone_number', 'user_id', 'public'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
