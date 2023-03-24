<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Form;
use App\Services\SurveyService;
use Illuminate\Support\Facades\Auth;
class SurveyController extends Controller
{
    protected $surveyService;

    public function __construct(SurveyService $surveyService){
        $this->surveyService = $surveyService;
    }
    //danh sach cac form khao sat da tham gia va da tao
    public function index(){
        $u_id = Auth::user()->id;
        return view('users.surveys.index',[
        'title'=> 'Danh sách các khảo sát của bạn',
        'forms' => $this->surveyService->getForm($u_id),
        'sheets' => $this->surveyService->getSheet($u_id)
    ]);
    }
}
