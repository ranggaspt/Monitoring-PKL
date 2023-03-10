<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $fillable = ['question_id','package_id'];

    public function question(){
        return $this->BelongsTo('App\Models\Question');
    }

    public function package(){
        return $this->BelongsTo('App\Models\Package');
    }
}
