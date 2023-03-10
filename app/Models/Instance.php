<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'instance_name',
        'instance_address',
        'photo', 
        'email',
        'phone'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function packages(){
        return $this->hasMany('App\Models\Package');
    }
}
