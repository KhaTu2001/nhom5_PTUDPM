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
            <div class="search_box">
                <h4>Mời nhập tên khảo sát</h4>
                <form action="" method="post">
                    @csrf
                    <div class="search_bar">
                        <input type="text" name="search" class="form-control form-control-lg form-control-borderless"
                            placeholder="Nhập tên khảo sát muốn tham gia">
                    </div>
                </form>
            </div>
            @if (count($forms) > 0)
            <div class="container results_box">
                <h2 class="txt_results-title">
                    Khảo sát cần tìm
                </h2>
                    @foreach ($forms as $form)
                    <div class="col-xl-6 m-auto">
                        <div class="results_content">
                            <h4 class="txt_results_content">
                                <a href="" style="text-decoration: none;">
                                    {{$form->title}}
                                </a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
