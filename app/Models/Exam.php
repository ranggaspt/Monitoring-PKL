<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'participant_id',
        'token',
        'exam_result',
        'behaviour_result',
        'status',
        'exam_status',
    ];

    public function package(){
        return $this->belongsTo('App\Models\Package');
    }

    public function participants(){
        return $this->belongsTo('App\Models\Participant');
    }
}
