@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5">
            <div class="text-center">
                <img class="title-page" src="{{ asset('assets/front/images/title-encounters.svg')}}">
                <p class="description-page text-center fw-bold drop-shadow mt-3">Các sự kiện xuất hiện từ 2 đến 5 lần trong mỗi trò chơi. Chúng xuất hiện ngẫu nhiên trên chiến trường và đôi khi có thể gặp trong vòng Đi chợ. Có hơn {{ count($encounters) }} sự kiện khác nhau trong Inkborn Fables.</p>
            </div>

            <div class="list-champion">
                <!-- Champion Card -->
                 @foreach($encounters as $encounter)
                 <div class="champion-detail">
                    <div class="position-relative">
                        <img class="img-champion" src="{{ Voyager::image($encounter->thumb) }}">
                    </div>
                    <div class="info-champion mb-2">
                        <h2> {{ $encounter['name'] }}</h2>
                        <div class="opacity-50">
                            {{ $encounter['option'] }} option
                        </div>
                    </div>
                    <div class="px-3">
                    {!! $encounter['content'] !!}
                    </div>
                </div>
                 @endforeach
                <!--  -->
               
            </div>
        </div>
    </section>
    @endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush