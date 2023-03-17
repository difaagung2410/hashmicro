@extends('app')
@section('content')
    <div class="container text-center mt-4">
        @auth
            <h1>Selamat Datang {{ auth()->user()->name }}</h1>
            <p>Silakan akses fitur yang ada di navbar.</p>
        @endauth
        @guest
            <h1>Selamat Datang</h1>
            <p>Silakan login terlebih dahulu jika ingin mengakses fitur yang ada.</p>
        @endguest
    </div>
@endsection
@push('script')
    <script>
        $('.nav-item.home').addClass('active');
    </script>
@endpush