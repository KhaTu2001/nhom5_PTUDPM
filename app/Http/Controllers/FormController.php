<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Services\FormService;

class FormController extends Controller
{
    //thêm khảo sát
    public function create(){
        return view('users.forms.add',[
            'title' => 'Thêm khảo sát'
        ]);
    }
}
