@include('blocks.head')
@section('title')
    {{ $title }}
@endsection
    <div class="sign-up" style="background-image: url(/img/bg.png); background-size: cover;">
        <div class="sign-up__container">
            <div class="sign-up-form mask d-flex h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-end align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-7 align-items-center">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Hệ thống khảo sát Đại học Thuỷ lợi</h2>
                                    @if ($errors->any())
                                    <div class="alert alert-danger text-center">
                                        Thông tin điền vào chưa đúng. Vui lòng nhập lại.
                                    </div>
                                @endif
                                    <form id="form-1" action="{{ route('create') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <div class="txt_form-label">
                                                <label class="form-label" for="form3Example1cg">Họ tên</label>
                                                <p>*</p>
                                            </div>
                                            <input type="text" id="name" name="name" placeholder="Nhập họ tên"
                                                class="form-control form-control-lg" value="{{old('name')}}"/>
                                                @error('name')
                                                <span class="form-message text-danger">{{$message}}</span>
                                                @enderror
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="txt_form-label">
                                                <label class="form-label" for="form3Example3cg">Tài khoản email</label>
                                                <p>*</p>
                                            </div>
                                            <input type="email" id="email" name="email"
                                                placeholder="Nhập tài khoản email" class="form-control form-control-lg" value="{{old('email')}}"/>
                                                @error('email')
                                                <span class="form-message text-danger">{{$message}}</span>
                                                @enderror
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="txt_form-label">
                                                <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                                <p>*</p>
                                            </div>
                                            <input type="password" id="password" name="password" placeholder="********"
                                                class="form-control form-control-lg" />
                                                @error('password')
                                                <span class="form-message text-danger">{{$message}}</span>
                                                @enderror
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="txt_form-label">
                                                <label class="form-label" for="form3Example4cdg">Xác thực mật khẩu</label>
                                                <p>*</p>
                                            </div>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                placeholder="********" class="form-control form-control-lg" />
                                            <span class="form-message"></span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-block btn-lg gradient-custom-4 text-body">Đăng kí</button>
                                        </div>
                                        <p class="text-center text-muted mt-5 mb-0">Đã có tài khoản? <a
                                                href="{{ route('login') }}" class="fw-bold text-body"><u>Đăng nhập</u></a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name', 'Nhập vào họ tên đầy đủ'),
                    Validator.isEmail('#email'),
                    Validator.minLength('#password', 6),
                    Validator.isRequired('#password_confirmation'),
                    Validator.isConfirmed('#password_confirmation', function() {
                        return document.querySelector('#form-1 #password').value;
                    }, 'Mật khẩu nhập lại không chính xác')
                ],
            });
        });
    </script>
@include('blocks.end')
