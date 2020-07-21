<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'impacts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'description', 'title'
    ];

    public function images()
    {
        return $this->morphMany('App\Gallety', 'galleriable');
    }
}
