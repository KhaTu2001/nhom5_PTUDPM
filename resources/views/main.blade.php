@yield('top')
@section('title')
    {{ $title }}
@endsection
@include('blocks.nav')
@yield('content')
@include('blocks.footer')
@include('blocks.end')
@yield('customJS')
