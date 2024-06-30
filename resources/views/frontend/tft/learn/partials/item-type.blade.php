@if(@isset($typeItems) )
@foreach($typeItems as $item)
    <div class="col-md-3 text-center item-detail">
        <img class="img-item" src="{{ Voyager::image($item['thumb']) }}">
        <p class="title-item">Band of Thieves</p>
        <span>{!! $item['content'] !!}</span>
    </div>
@endforeach
@endif