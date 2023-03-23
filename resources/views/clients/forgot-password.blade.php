@extends('main')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main" style="background-image: url(/img/bg.png); background-size: cover;">

        <form action="" method="POST" class="form p-5" id="form-2">
            @csrf
            <h2 class="heading mb-3">Hệ Thống Khảo Sát Đại Học Thủy Lợi</h2>
            <h1 style="font-size: 50px; color: #0da9ed;">Quên mật khẩu</h1>
            <div class="form-group m-5">
                <label for="email" class="form-label">Tài khoản Email<p>*</p></label>
                <input id="email" name="email" type="text" placeholder="Nhập tài khoản email của bạn"
                    class="form-control">
                <span class="form-message"></span>
            </div>


            <button class="form-submit" type="submit" style="color: white; text-decoration: none;">Xác nhận</button>
            <p class="desc"><a href="{{route('login')}}" style="color: black;">Quay lại trang đăng nhập?</a></p>
        </form>
        @if (session('msg'))
            <div id="snackbar">{{ session('msg') }}</div>
        @endif
    </div>
@endsection
@section('customJS')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-2',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isEmail('#email'),
                ],
            });
        });
    </script>
@endsection
