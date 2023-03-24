@include('blocks.head')
@section('title')
    {{ $title }}
@endsection

    <div class="main" style="background-image: url(/img/bg.png); background-size: cover;">
        <form action="{{ route('authenticate') }}" method="POST" class="form p-5" id="form-2">
            @csrf
            <h2 class="heading mb-3">Hệ Thống Khảo Sát Đại Học Thủy Lợi</h2>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Tài khoản Email<p>*</p></label>
                <input id="email" name="email" type="text" placeholder="Nhập tài khoản email của bạn"
                    class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Mật khẩu<p>*</p></label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit" type="submit" style="color: white; text-decoration: none;">Đăng nhập</button>
            <p class="desc"><a href="{{route('forgot-password')}}" style="color: rgb(0, 17, 255);">Quên mật khẩu?</a></p>
            <p class="desc">Bạn chưa có tài khoản? <a href="{{route('signup')}}" style="color: aqua;">Đăng kí</a></p>
        </form>
        @if (session('msg'))
            <div id="snackbar">{{ session('msg') }}</div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-2',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isEmail('#email'),
                    Validator.minLength('#password', 6),
                ],
            });
        });
    </script>

@include('blocks.end')