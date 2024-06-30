@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5">
            <h1 class="title-page text-center text-uppercase text-white">Lõi Tướng</h1>
            <p class="description-page text-center fw-bold">Tất cả {{ count($augments) }} lõi bổ sung trong Teamfight Tactics Inkborn Fables.</p>
            <ul class="nav my-4 justify-content-center tabs-category">
                <li class="nav-item">
                  <a class="nav-link augment active" value="default" aria-current="page" href="#">Tất cả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link augment" value="tier1" href="#">Cấp 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link augment" value="tier2" href="#">Cấp 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link augment" value="tier3" href="#">Cấp 3</a>
                </li>
              </ul>
            <div class="list-item" id="list-item">
                @foreach($augments as $item)
                <div class="col-md-3 text-center item-detail">
                    <img class="img-item" src="{{ Voyager::image($item->thumb) }}">
                    <p class="title-item">Band of Thieves</p>
                    <span>{!! $item->content !!}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection
@push('scripts')
    <script type="text/javascript">
    $('.augment').on('click', function() {
			$('.nav-link').removeClass('active');
      $(this).addClass('active'); 
      var type = $(this).attr('value');
        $.ajax({
          type: 'POST',
          url: '{{ route('ajaxAugmentType') }}',
          data: {
              'type' : type,
              '_token': $('meta[name="csrf-token"]').attr('content')
          },
          datatype: 'html',
          success: function(data) {
                if(data.success == true) {
                  $('#list-item').html(data.html);
                }
          },
      
        });
		});
    </script>
@endpush