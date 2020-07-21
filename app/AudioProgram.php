<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioProgram extends Model
{
     /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'audio_programs';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'program', 'episode_number',
        'first_aired_on', 'aired'
    ];


}
