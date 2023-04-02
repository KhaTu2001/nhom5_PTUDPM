<nav class="navbar navbar-light p-0">
    <div class="container">
        <div class="nav_left">
            <a class="btn_home_page" href="{{route('users.index')}}">Trang chủ</a>
            <a class="btn_toFormpage" href="{{route('users.survey.index')}}">Các khảo sát</a>
        </div>
        <div class="nav_right">
            <div class="logout_btn">
                <strong>
                    <a href="{{route('logout')}}">
                        Đăng xuất
                    </a>
                </strong>
            </div>
            <div class="profile_btn">
                <i class="fa-regular fa-user"></i>
                <strong style="text-transform: uppercase">
                    <a href="#">
                        {{Auth::user()->name}}
                    </a>
                </strong>
            </div>
        </div>
    </div>
</nav>