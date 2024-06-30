@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5 text-center slogan-content">
            <img class="mw-500" src="{{ asset('assets/front/images/frodan.png') }}">
            <div class="mt-2">
                <p class="description-page text-center fw-bold drop-shadow mt-3">Xem Tiger 1 TFT, nhà bình luận esports nổi tiếng, 
                trên chương trình Youtube khi anh ấy phân tích về những người chơi hàng đầu, và kiểm tra các hướng dẫn mới nhất của anh ấy.</p>
            </div>
        </div>
       
        <div class="container-xxl text-center">
            <h3 class="title-list-video">FEATURED</h3>
        </div>
        <div class="container-xxl mt-4 mb-4 list-video">
        @foreach($comps as $item)
            @if($item['option'] == "featured")
                <a href="{{ $item['link'] }}" target="_blank">
                    <div class="mw-385">
                    <img class="thumb-video" src="{{ Voyager::image($item->thumb) }}">
                    <p class="title-video">
                        {{ $item['title'] }}
                    </p>
                    </div>
                </a>
            @endif
        @endforeach
        </div>
        <div class="container-xxl text-center">
            <h3 class="title-list-video">COMPS</h3>
        </div>
        <div class="container-xxl mt-4 mb-4 list-video">
        @foreach($comps as $comp)
            @if($comp['option'] == "comps")
                <a href="{{ $comp['link'] }}" target="_blank">
                    <div class="mw-385">
                    <img class="thumb-video" src="{{ Voyager::image($comp->thumb) }}">
                    <p class="title-video">
                        {{ $comp['title'] }}
                    </p>
                    </div>
                </a>
            @endif
        @endforeach
            
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush