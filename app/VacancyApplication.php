<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyApplication extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'vacancy_applications';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'applicant', 'cover', 'cv', 'vacancy_id', 'due'
    ];

    public function vacancy()
    {
        return $this->belongsTo('App\Vacancy');
    }
}
