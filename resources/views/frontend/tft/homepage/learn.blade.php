@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
    <div class="container-xxl mt-5">
        <!-- <h1 class="title-page text-center text-uppercase text-white">Augments</h1> -->
         <div class="text-center">
            <img src="{{ asset('assets/front/images/title-learn.svg')}}">
            <p class="description-page text-center fw-bold drop-shadow mt-3">Học mọi thứ về cơ chế trong phiên bản mới nhất trong mùa 12 của Teamfight Tactics - Inkborn Fables.</p>
         </div>
        <div class="list-image-box">
            <div class="image-container">
                <a href="{{ route('encounters') }}">
                    <div class="image-front-box"style="background-image:url({{ asset('assets/front/images/encounters1.webp')}})"></div>
                    <div class="image-back-box"style="background-image:url({{ asset('assets/front/images/encounters2.webp')}})"></div>
                </a>
            </div>
            <div class="image-container">
                <a href="{{ route('items') }}">
                    <div class="image-front-box"style="background-image:url({{ asset('assets/front/images/items1.webp')}})"></div>
                    <div class="image-back-box"style="background-image:url({{ asset('assets/front/images/items2.webp')}})"></div>
                </a>
            </div>
            <div class="image-container">
                <a href="{{ route('champions') }}">
                    <div class="image-front-box"style="background-image:url({{ asset('assets/front/images/champions1.webp')}})"></div>
                    <div class="image-back-box"style="background-image:url({{ asset('assets/front/images/champions2.webp')}})"></div>
                </a>
            </div>
            <div class="image-container">
                <a href="{{ route('traits') }}">
                    <div class="image-front-box"style="background-image:url({{ asset('assets/front/images/traits1.webp')}})"></div>
                    <div class="image-back-box"style="background-image:url({{ asset('assets/front/images/traits2.webp')}})"></div>
                </a>
            </div>
            <div class="image-container">
                <a href="{{ route('augments') }}">
                    <div class="image-front-box"style="background-image:url({{ asset('assets/front/images/augments1.webp')}})"></div>
                    <div class="image-back-box"style="background-image:url({{ asset('assets/front/images/augments2.webp')}})"></div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush