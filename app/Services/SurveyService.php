<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyService
{
    //lay danh sach phieu khao sat da tham gia
    public function getSurvey($u_id){
        return  Survey::with('form')->where('user_id', $u_id)->get();

    }
}
