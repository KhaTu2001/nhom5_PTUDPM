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
    //danh sach cac form khao sat da tham gia
    public function index(){
        $u_id = Auth::user()->id;
        return view('users.surveys.index',[
        'title'=> 'Danh sách các khảo sát của bạn',
        'surveys' => $this->surveyService->getSurvey($u_id)
    ]);
    }
    // //tham gia khảo sát
    // public function create(Survey $survey){
    //     return view('users.surveys.sheet',[
    //         'title' => 'Phiếu khảo sát',
    //         'form' => $this->surveyService->form($survey->form_id),
    //         'questions' =>$this->surveyService->questions($survey->form_id),
    //     ]);
    // }
    // //hien form khao sat da tham gia 
    // public function show(Survey $survey){
    //     return view('users.surveys.sheet',[
    //         'title' => 'Phiếu khảo sát',
    //         'form' => $this->surveyService->form($survey->form_id),
    //         'questions' =>$this->surveyService->questions($survey->form_id),
    //     ]);
    // }
}
