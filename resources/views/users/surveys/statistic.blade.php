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
                <h1>Thống kê phiếu trả lời khảo sát</h1>
            </div>
            <hr class="container-fluid hr_container-detail">
            <div class="container">
                @foreach ($questions as $key => $question)
                    <div class="row row_detail_box mb-5">
                        <div class="col-xl-3 col-md-3">
                            <div class="number_answer">
                                <h4>Câu {{ $key + 1 }}</h4>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-9">
                            <div class="answer_content">
                                <h4>{{ $question['content'] }}</h4>
                            </div>
                        </div>
                    </div>
                    @foreach ($question['answer'] as $answer)
                        <div class="col-xl-3 col-md-3 mb-3">
                            <div class="answer_correct">
                                <h4>{{ $answer['content'] }}</h4>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="container statistical_bottom">
            <div class="statistical_bottom-left">
                <a href="#" class="export-btn">Form khảo sát</a>
            </div>
            <div class="statistical_bottom-right">
                <a href="statistical_user.html" class="export-btn">Thống kê người tham gia</a>
            </div>
        </div>
    </div>
    </div>
@endsection
