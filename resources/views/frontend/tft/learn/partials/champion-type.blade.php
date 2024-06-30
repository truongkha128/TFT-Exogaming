@if(@isset($typeChampions) )
    @foreach($typeChampions as $typeChampion)
    <div class="champion-detail {{ config('constants.type_gold_cham')[$typeChampion['type']] }}">
        <div class="position-relative">
            <img class="img-champion" src="{{ Voyager::image($typeChampion->thumb) }}">
            <div class="info-money">
                <img class="icon-gold" src="{{ asset('assets/front/images/gold.svg')}}">
                <p class="m-0">{{ $typeChampion['type'] }}</p>
            </div>
        </div>
        <div class="info-champion">
            <h2>{{ $typeChampion['name'] }}</h2>
            <div class="core-champion">
                @foreach($typeChampion->trait as $itemType)
                <img src="{{ Voyager::image($itemType->thumb) }}">
                @endforeach
            </div>
        </div>
        <div class="description-champion">
            <img src="{{ Voyager::image($typeChampion->image_skill) }}">
            <div>
                <p class="text-xl fw-bold m-0">{{ $typeChampion['skill'] }}</p>
                <span>{!! $typeChampion['content'] !!}</span>
            </div>
        </div>
    </div>
    @endforeach
@endif