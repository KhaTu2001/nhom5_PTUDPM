@extends('main')
@section('top')
    @include('blocks.head')
@endsection
@section('content')
    <div class="home">
        <img src="/img/trang-chu.png">
        <div class="home_container">

            <hr class="container hr_container">
            <div class="container form_active-box">
                <div class="join_form-box">
                    <h4>
                        <a href="{{route('users.search')}}" style="text-decoration: none">
                            Tham gia khảo sát
                        </a>
                    </h4>
                </div>
                <div class="create_form-box">
                    <h4>
                        <a href="{{route('users.form.create')}}" style="text-decoration: none">
                            Tạo khảo sát
                        </a>
                    </h4>
                </div>
            </div>
            <div class="container about-us_box">
                <div class="about-us_box-right">
                    <div class="txt_about-us">
                        <h1>About Us</h1>
                    </div>
                    <div class="container about-us_form">
                        <div class="row content_about-us">
                            <h4>Sản phẩm này được xây dựng và đóng góp bởi</h4>
                            <ul>
                                <li>Nguyễn Khả Tú</li>
                                <li>Nguyễn Văn Đông</li>
                                <li>Nguyễn Anh XUân</li>
                                <li>Dương Hoàng Yến</li>
                                <li>Phạm Thanh Hải</li>
                                <li>Vũ Văn Chức</li>
                                <li>Đặng Quang Minh</li>
                                <li>Trần Trung Thành</li>
                                <li>Nguyễn Tuấn Dũng</li>
                                <li>Đới Xuân Đạt</li>
                                <li>Nguyễn Hữu Bách</li>
                                <li>Đặng Đức Trường</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="home_banner container"> --}}
        </div>
    </div>
@endsection
