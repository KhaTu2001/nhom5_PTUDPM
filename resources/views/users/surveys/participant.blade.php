@extends('main')
@section('top')
    @include('blocks.head')
@endsection
@section('content')
<div class="container-fluid statistics">
    <hr class="container hr_container">
    <div class="container detail_box">
        <div class="detail_box-top">
            <div class="red_line"></div>
            <h1>Số lượng người tham gia</h1>
        </div>
        <hr class="container-fluid hr_container-detail">
        <div class="container ">
            <div class="banner">
                <img class="number_user-background" src="/img/number_user-background.png" alt="">
                <div class="box_content">
                    <div class="img">
                        <img src="/img/temp.png" alt="">
                    </div>
                    
                    <div class="number_user-box">
                        <h4 class="txt_number-user">
                            {{count($participants)}} người đã tham gia
                        </h4>
                    </div>
                </div>
                
            </div>          
        </div>
    </div>
    <div class="container detail_box">
        <div class="detail_box-top">
            <div class="red_line"></div>
            <h1>Thông tin người tham gia</h1>
        </div>
        <hr class="container-fluid hr_container-detail">
        <div class="container">
            @foreach ($participants as $participant)
            <div class="row row_detail_box mb-3">
                <div class="col-xl-3 col-md-4">
                    <div class="user_name">
                        <h4>{{$participant->name}}</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4">
                    <div class="email_adress">
                        <h4>{{$participant->email}}</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4">
                    <div class="date">
                        <h4>{{$participant->created_at}}</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4">
                    <div class="note">
                        <h4>{{$participant->note}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container statistical_bottom">
        <div class="statistical_bottom-left">
            <a href="{{route('users.survey.show',$participant->form_id)}}" class="export-btn">Form khảo sát</a>
        </div>
        <div class="statistical_bottom-right">
            <a href="{{route('users.statistic',$participant->form_id)}}" class="export-btn">Thống kê câu trả lời</a>
        </div>
    </div>
</div>
@endsection
