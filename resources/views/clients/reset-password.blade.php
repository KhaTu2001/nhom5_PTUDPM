@include('blocks.head')
@section('title')
    {{ $title }}
@endsection
<div class="main" style="background-image: url(/img/bg.png); background-size: cover;">

    @if ($check)
        <form action="{{ route('reset_password.post') }}" method="POST" class="form" id="form-1">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h3 class="heading">Hệ Thống Khảo Sát Đại Học Thủy Lợi</h3>
            <div class="spacer"></div>
            <h1 style="font-size: 50px; color: #0da9ed;">Quên mật khẩu</h1>

            <div class="spacer"></div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu mới<p>*</p></label>
                <input id="password" name="password" type="password" placeholder="Enter your password"
                    class="form-control">
                @error('password')
                    <div class="error  text-danger">{{ $message }}</div>
                @enderror
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu<p>*</p></label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Confim your password" type="password"
                    class="form-control">
                @error('password_confirmation')
                    <div class="error text-danger" >{{ $message }}</div>
                @enderror
                <span class="form-message"></span>
            </div>
            <button class="form-submit" type="submit">Xác nhận</button>
            <div class="spacer"></div>
        </form>
    @else
        <div class="container">
            <h2 style="color: red" class="text-center mt-5">Yêu cầu không khả dụng.</h2>
            <div class="text-center mt-5">
                <p class="text-secondary">
                    Yêu cầu của bạn đã hết hạn.
                </p>
                <p>
                    Quay lại trang <a href="{{ route('login') }}">đăng nhập.</a>
                </p>
            </div>
        </div>
    @endif
</div>

@include('blocks.end')
