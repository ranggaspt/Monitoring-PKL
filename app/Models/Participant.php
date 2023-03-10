<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_identity',
        'no_reg',
        'user_id',
        'name',
        'gender',
        'address',
        'photo',
        'email',
        'education',
        'date_of_birth',
        'phone'
    ];
    protected $nullable = [
		'photo',
	];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function exams(){
        return $this->belongsToMany('App\Models\Exam');
    }
}
