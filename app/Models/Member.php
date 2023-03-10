<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['participant_id','package_id'];

    public function participant(){
        return $this->BelongsTo('App\Models\Participant');
    }

    public function package(){
        return $this->BelongsTo('App\Models\Package');
    }
}
