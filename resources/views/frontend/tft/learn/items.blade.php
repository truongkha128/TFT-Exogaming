@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class="container-xxl mt-5">
            <h1 class="title-page text-center text-uppercase text-white">Trang bị</h1>
            <p class="description-page text-center fw-bold">Tìm hiểu mọi thứ về các vật phẩm trong Bộ 11.
              Có hơn {{ count($items) }}  vật phẩm khác nhau trong Inkborn Fables.</p>
            <ul class="nav my-4 justify-content-center tabs-category">
                <li class="nav-item">
                  <a class="nav-link items active" value="default" aria-current="page" href="#">Tất cả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link items" value="component" href="#">Components</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link items" value="craftable" href="#">Craftable</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link items" value="emblem" href="#">Emblem</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link items" value="radiant" href="#">Radiant</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link items" value="ornn" href="#">Ornn</a>
                </li>
              </ul>
            <div class="list-item" id="list-item">
                @foreach($items as $item)
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
    $('.items').on('click', function() {
    $('.nav-link').removeClass('active');
      $(this).addClass('active'); 
      var type = $(this).attr('value');
        $.ajax({
          type: 'POST',
          url: '{{ route('ajaxItemsType') }}',
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