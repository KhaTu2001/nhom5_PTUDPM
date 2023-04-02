<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Survey;
use App\Services\SurveyService;
use App\Services\FormService;
use Illuminate\Support\Facades\Auth;
class SurveyController extends Controller
{
    protected $surveyService;
    protected $formService;
    public function __construct(SurveyService $surveyService,FormService $formService){
        $this->surveyService = $surveyService;
        $this->formService = $formService;
    }
    //danh sach cac form khao sat da tham gia va da tao
    public function index(){
        $u_id = Auth::user()->id;
        return view('users.surveys.index',[
        'title'=> 'Danh sách các khảo sát của bạn',
        'sheets' => $this->surveyService->getSheet($u_id),
        'surveys' => $this->surveyService->getSurveys($u_id)
    ]);
    }
    //hien thi noi dung form khao sat da tao
    public function show(Form $survey){
        return view('users.surveys.content',[
            'title' => 'Nội dung biểu mẫu',
            'form' => $this->formService->form($survey->id),
            'questions' => $this->surveyService->questions($survey->id)
        ]);
    }
    //thong ke nguoi tham gia khao sat cua minh
    public function participant(Form $survey){
        return view('users.surveys.participant',[
            'title' => 'Thống kê người tham gia',
            'participants' => $this->surveyService->getParticipants($survey)
        ]);
    }
    //thong ke cau tra loi cua cac phieu khao sat
    public function statistic(Form $survey){
        return view('users.surveys.statistic',[
            'title' => 'Thống kê phiếu trả lời',
            'questions' => $this->surveyService->questions($survey->id)
        ]);
    }
}
