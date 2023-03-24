<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'open_at',
        'close_at',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function surveys(){
        return $this->hasMany('App\Models\Survey');
    }
}
