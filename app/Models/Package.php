<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'instance_id',
        'name',
        'desc',
        'photo',
        'max_participant',
        'min_education',
        'start_at',
        'finish_at',
        'duration',
        'status'
    ];

    public function instance(){
        return $this->belongsTo('App\Models\Instance');
    }

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function exam(){
        return $this->hasMany('App\Models\Exam');
    }
}
