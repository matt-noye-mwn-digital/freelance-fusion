<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client(){
        return $this->belongsTo(User::class);
    }
    public function staff(){
        return $this->belongsTo(User::class);
    }

}
