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
        </div>
    </div>
@endsection
