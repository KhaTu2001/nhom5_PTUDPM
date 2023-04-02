@extends('main')
@section('top')
    @include('blocks.header')
@endsection
@section('content')
    <div class="spacer" style="height:5px; background-color: #9bc5ef; margin: 0 50px 0 90px;"></div>
    <div class="container" style="margin-top: 100px;">
        <form action="" id="name-survey-form">
            <div class="form-group1">
                <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                    <h1 style="padding-top: 6px; text-align: center;">{{ $form->title }}</h1>
                </div>
                <div class="spacer" style=" margin-top: 12px;"></div>
                <div style="height: 40px; background-color: aqua; border-radius: 10px;">
                    <p style="padding-top: 12px; padding-left: 20px; font-weight: bold;">{{ $form->description }}</p>
                </div>
            </div>
        </form>
        @foreach ($questions as $key => $question)
            <div class="spacer"></div>
            <div class="quest-num">
                <h3 style="color: white; padding-top: 10px;">Câu hỏi {{ $key + 1 }}</h3>
            </div>
            <form action="" id="survey-form">
                <div class="form-group1">
                    <div style="height: 40px; background-color: aqua; border-radius: 10px; font-weight: 600;">
                        <p id="quest">{{ $question['content'] }}</p>
                    </div>
                    <div class="spacer"></div>
                    @foreach ($question['answer'] as $answer)
                        <div class="chose">
                            <p>
                                <label for="" class="survey-label">
                                    <input type="radio" disabled name="source" class="inputRadio">
                                    {{ $answer['content'] }}
                                </label>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="spacer"></div>
            </form>
        @endforeach
        <div class="spacer"></div>
    </div>
    <div class="col-6 m-auto">
        <div class="row">
            <div class="row col-6">
                <div class="col-12 d-flex">
                    <a href="{{route('users.participant',$form->id)}}" class="col-6 statistic">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                        Thống kê người tham gia
                    </a>
                    <a href="{{route('users.statistic',$form->id)}}" class="col-6 statistic">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                        Thống kê câu trả lời
                    </a>
                </div>
            </div>
            <div class="col-6">
                <button class="form-survey-submit">Xuất khảo sát</button>
            </div>
        </div>
    </div>
    <div class="spacer"></div>
@endsection
