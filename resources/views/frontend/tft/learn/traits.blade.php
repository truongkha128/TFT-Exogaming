@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5">
            <h1 class="title-page text-center text-uppercase text-white">Ấn Tướng</h1>
            <p class="description-page text-center fw-bold">Tất cả {{ count($traits) }} lõi bổ sung trong Teamfight Tactics Inkborn Fables.</p>
            <ul class="nav my-4 justify-content-center tabs-category">
                <li class="nav-item">
                  <a class="nav-link traits active" value="default" aria-current="page" href="#">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link traits" value="classes" href="#">Classes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link traits" value="origins" href="#" >Origins</a>
                </li>
              </ul>
            <div class="list-item list-trail" id="list-item">
                @foreach($traits as $trait)
                <div class="col-md-3 text-center item-detail">
                    <img class="img-item" src="{{ Voyager::image($trait->thumb) }}">
                    <p class="title-item">{{ $trait['name'] }}</p>
                    <span >{{ $trait['description'] }}.</span>
                    <hr>
                    <div class="text-start mt-3">
                        <p>{!! $trait['content'] !!}</p>
                    </div>
                    <!-- <div class="list-character-trail">
                        <a href=""><img src="./images/aatrox-thumb.webp"></a>
                        <a href=""><img src="./images/ahri-thumb.webp"></a>
                        <a href=""><img src="./images/ahri-thumb.webp"></a>
                        <a href=""><img src="./images/ahri-thumb.webp"></a>
                        <a href=""><img src="./images/ahri-thumb.webp"></a>
                        <a href=""><img src="./images/ahri-thumb.webp"></a>
                    </div> -->
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endsection
@push('scripts')
    <script type="text/javascript">
    $('.traits').on('click', function() {
    $('.nav-link').removeClass('active');
      $(this).addClass('active'); 
      var type = $(this).attr('value');
        $.ajax({
          type: 'POST',
          url: '{{ route('ajaxTraitsType') }}',
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