@extends('main')
@section('top')
    @include('blocks.head')
@endsection
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="search_page">
        <hr class="container hr_container">
        <div class="container container_box">
            <div class="container results_box">
                <h2 class="txt_results-title">
                    Khảo sát đã tham gia
                </h2>
                @foreach ($forms as $form)
                <div class="row " style="display: flex; justify-content: center;">

                    <div class="col-xl-6">
                        <div class="results_content">
                            <a href="#" class="txt_results_content">
                                <h3>{{$form->title}}</h3>
                                    <div class="row">
                                            <div class="col-6 owner">
                                                <h4>Người tạo</h4>
                                                <h5>{{$form->name}}</h5>
                                            </div>
        
                                            <div class="col-6 created_date">
                                                <h4>Ngày tạo</h4>
                                                <h5>{{$form->open_at}}</h5>
                                            </div> 
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="container results_box">
                <h2 class="txt_results-title">
                    Khảo sát đã tạo
                </h2>
                @foreach ($sheets as $sheet)
                <div class="row " style="display: flex; justify-content: center;">
                    <div class="col-xl-6">
                        <div class="results_content">
                            <a href="#" class="txt_results_content">
                                <h3>{{$sheet->title}}</h3>
                                    <div class="row">
                                            <div class="col-6 owner">
                                                <h4>Người tạo</h4>
                                                <h5>Bạn</h5>
                                            </div>
                                            <div class="col-6 created_date">
                                                <h4>Ngày tạo</h4>
                                                <h5>24-09-2023</h5>
                                            </div> 
                                    </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
