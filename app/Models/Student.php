<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'instance_id',
        'classes_id',
        'study_id',        
        'nisn',
        'name',
        'gender',
        'address',
        'photo',
        'email',
        'phone'
    ];
    protected $nullable = [
		'photo',
	];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function instance(){
        return $this->belongsTo('App\Models\Instance');
    }

    public function classes(){
        return $this->belongsTo('App\Models\Classes');
    }

    public function study(){
        return $this->belongsTo('App\Models\Study');
    }
}
