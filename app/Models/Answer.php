<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
    ];
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
    public function answers() {
        return $this->belongsToMany('App\Models\Survey', 'answer_survey', 'answer_id', 'survey_id');
    }
}
