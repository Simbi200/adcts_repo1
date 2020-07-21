<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'reports';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'submitted_on',
        'path', 'submitted_by'
    ];
}
