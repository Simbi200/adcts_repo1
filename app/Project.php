<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'projects';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'starts',
        'ends'
    ];

    public function partners(){
        return $this->belongsToMany('App\Partner');
    }


    public function images()
    {
        return $this->morphMany('App\Gallety', 'galleriable');
    }
}
