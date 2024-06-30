@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
    <div class="container mt-5 text-center slogan-content">
        <img class="mw-500" src="{{ Voyager::image(setting('exogaming.image_logo')) }}">
        <div class="d-md-flex align-items-center justify-content-center mt-2 gap-3">
            <img src="{{ asset('assets/front/images/icon-left.png')}}">
            <p class="slogan">
            {!! setting('exogaming.title') !!}
            </p>
            <img src="{{ asset('assets/front/images/icon-right.png')}}">
        </div>
        <img src="{{ Voyager::image(setting('exogaming.image_banner')) }}">
    </div>
    <div class="container mw-1100 d-md-flex mt-4 mb-4 list-image-home">
        <a href="{{ route('tierList') }}"><img src="{{ Voyager::image(setting('exogaming.image_tierList')) }}"></a>
        <a href="{{ route('guides') }}"><img src="{{ Voyager::image(setting('exogaming.guild')) }}"></a>
        <a href="{{ route('comps') }}"><img src="{{ Voyager::image(setting('exogaming.compos')) }}"></a>
        <a href="{{ route('newPlayer') }}"><img src="{{ Voyager::image(setting('exogaming.player')) }}"></a>
        <a href="{{ route('returnPlayer') }}"><img src="{{ Voyager::image(setting('exogaming.returning')) }}"></a>
    </div>
</section>
@endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush