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
                
                    <div class="col-xl-6 m-auto">
                        <div class="results_content">
                            <h4 class="txt_results_content">
                                <a href="" style="text-decoration: none;">
                                    Test
                                </a>
                            </h4>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
