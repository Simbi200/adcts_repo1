<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'vacancies';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'post', 'description', 'type', 'due'
    ];

    public function applications()
    {
        return $this->hasMany('App\VacancyApplication');
    }
}
