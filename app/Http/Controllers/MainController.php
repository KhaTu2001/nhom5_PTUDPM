<?php

namespace App\Http\Controllers;

use App\Services\FormService;
use App\Services\SurveyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $formService;
    protected $surveyService;
    public function __construct(FormService $formService,SurveyService $surveyService){
        $this->formService = $formService;
        $this->surveyService = $surveyService;
    }
    
    // trang home
    public function index()
    {
        return view('users.home', [
            'title' => 'Trang chủ'
        ]);
    }
    // trang hien form tim kiem
    public function search(){
        {
            return view('users.search', [
                'title' => 'Tìm kiếm'
            ]);
        }
    }
    // hien danh sach tim kiem
    public function show(Request $request){
        $u_id = Auth::user()->id;
        return view('users.forms.list', [
            'title' => 'Kết quả tìm kiếm',
            'forms' =>$this->formService->search($request,$u_id),
        ]);
    }
}
