<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Services\FormService;
use App\Services\SurveyService;

class SheetController extends Controller
{
    protected $surveyService;
    protected $formService;
    public function __construct(SurveyService $surveyService,FormService $formService){
        $this->surveyService = $surveyService;
        $this->formService = $formService;
    }
    //hien form khao sat da tham gia 
    public function show(Survey $sheet){
        // dd($sheet);
        return view('users.sheets.content',[
            'title' => 'Thông tin phiếu khảo sát',
            'form' => $this->formService->form($sheet->form_id),
            'questions' => $this->surveyService->questions($sheet->form_id),
            'answers' => $this->surveyService->answers($sheet->id)
        ]);
    }
}
