<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    protected $table = 'emails';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['email_address', 'user_id', 'public'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
