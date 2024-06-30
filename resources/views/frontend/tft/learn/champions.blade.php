@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5">
            <div class="text-center">
                <img class="title-page" src="{{ asset('assets/front/images/title-champion.svg')}}">
                <p class="description-page text-center fw-bold drop-shadow mt-3">Tất cả {{ count($champions) }} tướng trong Teamfight Tactics Inkborn Fables.</p>
            </div>
            <ul class="nav my-4 justify-content-center tabs-category">
                <li class="nav-item">
                    <a class="nav-link champions active" value="default" aria-current="page" href="#">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link champions" value="1" href="#"><img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link champions" value="2" href="#"><img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link champions" value="3" href="#"><img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link champions" value="4" href="#"><img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link champions" value="5" href="#"><img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">5</a>
                </li>
            </ul>
            <div class="list-champion" id="list-champion">
                <!-- Champion Card -->
                @foreach($champions as $champion)
                <div class="champion-detail {{ config('constants.type_gold_cham')[$champion['type']] }}">
                    <div class="position-relative">
                        <img class="img-champion" src="{{ Voyager::image($champion->thumb) }}">
                        <div class="info-money">
                            <img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">
                            <p class="m-0">{{ $champion['type'] }}</p>
                        </div>
                    </div>
                    <div class="info-champion">
                        <h2>{{ $champion['name'] }}</h2>
                        <div class="core-champion">
                            @foreach($champion->trait as $item)
                            <img src="{{ Voyager::image($item->thumb) }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="description-champion">
                        <img src="{{ Voyager::image($champion->image_skill) }}">
                        <div>
                            <p class="text-xl fw-bold m-0">{{ $champion['skill'] }}</p>
                            <span>{!! $champion['content'] !!}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('.champions').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active'); 
            var type = $(this).attr('value');
                $.ajax({
                type: 'POST',
                url: '{{ route('ajaxChampionsType') }}',
                data: {
                    'type' : type,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                datatype: 'html',
                success: function(data) {
                    if(data.success == true) {
                        $('#list-champion').html(data.html);
                    }
                },
            
                });
		});
    </script>
@endpush