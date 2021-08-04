<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class reception extends Model
{
    use HasFactory;
    protected $table = 'reception';
    protected $primaryKey = 'reception_no';
    public $timestamps = false;

    public function participant(){
        return $this->belongsTo(participant::class,'reception_no','reception_no',);
    }

    public function discipline(){
        return $this->belongsTo(discipline::class,'discipline_id','discipline_id',);
    }

    public function course(){
        return $this->belongsTo(course::class,'course_id','course_id',);
    }

    public function scopeSearch(Builder $query, array $params): Builder{
        if(!empty($params['discipline'])) $query->where('discipline.discipline_id',$params['discipline']);
        
        if(!empty($params['course'])) $query->where('course.course_id',$params['course']);

        if (!empty($params['keyword'])) {
            $query->where(function ($query) use ($params) {
                $query->where('reception.attend_date', '=', $params['keyword'])
                    ->orwhere('participant.school_year	', '=', $params['keyword']);
            });
        }
        
        return $query;
    }

}
