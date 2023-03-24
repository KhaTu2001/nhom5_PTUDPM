<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormService
{
    //Tim kiem form khao sat
    public function search($request,$u_id){
        return  Form::where('title','like','%' .$request->search . '%')  
        ->where('user_id','!=',$u_id)->get();
    }
        //lay thong tin form khao sat
        public function form($form_id){
            return  Form::with('user')->find($form_id);
        }
        //lay noi dung cau hoi cua form
        public function questions($form_id){
            return Question::with('answer')->where('form_id', $form_id)->get()->toArray();
        }
}
