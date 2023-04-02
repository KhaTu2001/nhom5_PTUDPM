<?php

namespace App\Services;

use App\Models\Survey;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormService
{
    //Tim kiem form khao sat chua tung tham gia va ko phai do minh tao
    public function search($request,$u_id){
        $user_id = $u_id;
        return  Form::where('title','like','%' .$request->search . '%')  
        ->where('user_id','!=',$user_id)
        ->whereNotExists(function ($query) use($user_id){
            $query->select('*')
            ->from('surveys')   
            ->whereRaw('surveys.form_id = forms.id AND user_id = ' . $user_id);
        })->paginate(10);
    }
        //lay thong tin form khao sat
        public function form($form_id){
            return  Form::with('user')->find($form_id);
        }
}
