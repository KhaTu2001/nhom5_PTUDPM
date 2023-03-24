<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'open_at',
        'close_at',
        'description',
    ];
    //lay thong tin nguoi tao phieu khao sat
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    //lay thong tin form khao sat tuong ung
    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }
}
