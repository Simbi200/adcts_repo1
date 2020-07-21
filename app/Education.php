<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'education';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'institution', 'qualification',
        'description', 'start_year', 'end_year', 'finished'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
