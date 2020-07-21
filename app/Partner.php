<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'partners';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description', 'logo',
        'email'
    ];

    public function projects(){
        return $this->belongsToMany('App\Project');
    }
}
