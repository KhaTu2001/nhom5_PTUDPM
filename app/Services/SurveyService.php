<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;


class SurveyService
{
    //lay danh sach form khao sat da tham gia
    public function getSheet($u_id){
        return Form::join('surveys','forms.id','surveys.form_id')
            ->join('users','forms.user_id','users.id')
                ->where('surveys.user_id', $u_id)->paginate(5);
    }
    // lay danh sach form khao sat da tao
    public function getSurveys($u_id){
        return Form::where('user_id', $u_id)->paginate(5);    
    }
            //lay noi dung cau hoi cua form khao sat
            public function questions($form_id){
                return  Question::with('answer')->where('form_id', $form_id)->get()->toArray();
                // dd($return);
    }   
    //thong ke nguoi tham gia khao sat
    public function getParticipants($survey){
        return  Survey::select('users.*','surveys.*')->join('users','users.id','user_id')->where('form_id',$survey->id)->get();
        //dd($return);
    }
    //lay danh sach phieu tra loi
    public function answers($sheet_id){
        $return = Survey::join('answer_survey','answer_survey.survey_id','surveys.id')
        ->where('surveys.id',$sheet_id)
        ->get();
        dd($return);
    }
}
