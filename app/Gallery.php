<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'galleries';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description', 'galleriable_id', 'galleriable_type'
    ];


    public function galleriable()
    {
        return $this->morphTo();
    }
}
