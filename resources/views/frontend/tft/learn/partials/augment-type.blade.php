@if(@isset($typeAugments) )
@foreach($typeAugments as $augment)
    <div class="col-md-3 text-center item-detail">
        <img class="img-item" src="{{ Voyager::image($augment['thumb']) }}">
        <p class="title-item">Band of Thieves</p>
        <span>{!! $augment['content'] !!}</span>
    </div>
@endforeach
@endif