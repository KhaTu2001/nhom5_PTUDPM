<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyService
{
    //lay danh sach form khao sat da tham gia
    public function getForm($u_id){
        return Form::join('surveys','forms.id','surveys.form_id')
            ->join('users','forms.user_id','users.id')
                ->where('surveys.user_id', $u_id)->get();
        // dd($return);
    }
    // lay danh sach phieu khao sat da tao
    public function getSheet($u_id){
        return Form::where('user_id', $u_id)->get();    
    }
}
