@if(@isset($typeTraits) )
@foreach($typeTraits as $item)
    <div class="col-md-3 text-center item-detail">
        <img class="img-item" src="{{ Voyager::image($item->thumb) }}">
        <p class="title-item">{{ $item['name'] }}</p>
        <span >{{ $item['description'] }}.</span>
        <hr>
        <div class="text-start mt-3">
            <p>{!! $item['content'] !!}</p>
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
@endif