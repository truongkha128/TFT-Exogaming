@if(@isset($champion) )
<div class="tab-content my-4" id="pills-tabContent">
    <div class="tab-pane fade tier-s-content active show" id="pills-home" role="tabpanel"
        aria-labelledby="pills-home-tab-{{ $champion['id'] }}">
        <div class="row">
            <div class="col-md-2">
                <div class="text-center info-corp">
                    <div class="hexagon-wrapper relative m-auto">
                        <div class="hexagon">
                            <div class="avt" style="background-image: url({{ Voyager::image($champion['thumb']) }})">
                            </div>
                        </div>
                        <div class="corp" style="background-image: url({{ Voyager::image($champion['core']) }})">
                        </div>
                    </div>
                    <div class="d-flex my-2 justify-content-center gap-2">
                        <div class="tier tier-s">
                            <h6 class="m-0">S</h6>
                        </div>
                        <div class="text-center">
                            <p class="text-uppercase m-0 fw-bold">{{ $champion['description'] }}</p>
                            <small class="text-danger text-uppercase fw-bold">{{ $champion['description']}}</small>
                        </div>
                    </div>
                    <div class="list-system">
                    @foreach($traits as $key => $trait)
                        @if($key<4)
                            <div class="item-system">
                                <img src="{{ Voyager::image($trait['trait']['thumb']) }}">
                                <p class="mb-0">{{ $trait['count'] }}</p>
                            </div>
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="list-core">
                        @foreach($champion->tierlists_augment as $augment)
                                <img src="{{ Voyager::image($augment->thumb) }}">
                        @endforeach
                    </div>
                    <div class="tip">
                        <p>{{$champion['tip']}}</p>
                        <div class="note-tip text-uppercase">TIP</div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="list-character justify-content-center">
                    <!-- Team 1  -->
                    @foreach($champion->tierlists_champion as $item_champion)
                    <div class="hexagon-wrapper relative">
                       <div class="hexagon {{ config('constants.type_gold')[$item_champion['type']] }}">
                           <div class="avt" style="background-image: url({{ Voyager::image($item_champion->thumb) }})">
                           </div>
                       </div>
                       @if($item_champion['star'] == 3)<div class="three-star"><img src="{{ asset('assets/front/images/3-start.png')}}" alt=""></div>@endif
                       <div class="name-character">{{ $item_champion['description']}}</div> 
                       <!-- <div class="corp item-centesr"
                           style="background-image: url({{ asset('assets/front/images/item-1.webp')}})">
                       </div>
                       <div class="corp item-lefts"
                           style="background-image: url({{ asset('assets/front/images/item-1.webp')}})">
                       </div>
                       <div class="corp item-right"
                           style="background-image: url({{ asset('assets/front/images/item-1.webp')}})">
                       </div> -->
                   </div>
                    @endforeach
                    <!--  -->
                </div>
                <div class="row pt-5">
                    <div class="col-md-12 text-center">
                            <p class="title-info-corp">VỊ TRÍ TƯỚNG</p>
                            <img src="{{ Voyager::image($champion->image_team) }}" class="w-100">
                    </div>
                    <p class="title-info-corp pt-5">Giai đoạn game</p>
                    <div class="col-md-6 ">
                        <div class="tip">
                            <div class="list-character justify-content-center">
                                <!-- Team 1  -->
                                @foreach($champion->tierlists_early as $early)
                                <div class="hexagon-wrapper relative">
                                    <div class="hexagon {{ config('constants.type_gold')[$early['type']] }}">
                                        <div class="avt"
                                            style="background-image: url({{ Voyager::image($early->thumb) }})">
                                        </div>
                                    </div>
                                    <div class="name-character">{{ $early['description']}}</div>
                                </div>
                                @endforeach
                                <!--  -->
                            </div>
                            <div class="note-tip text-uppercase">Đầu game</div>
                        </div>
                        <!-- <div class="tip">
                            <p>Early Econ > Combat Power > Items. Strong frontline is what scales
                                your
                                snipers. 6 Warden / 6 Sniper is very strong and worth playing. Look
                                for
                                Exalted combos with 1 Sniper / 1 Warden.</p>
                            <div class="note-tip text-uppercase">TIP</div>
                        </div>
                        <p class="title-info-corp">Trang bị</p> -->
                    </div>
                    <div class="col-md-6">
                        <div class="tip">
                            <div class="list-character justify-content-center">
                                <!-- Team 1  -->
                                @foreach($champion->tierlists_between as $itemBetween)
                                <div class="hexagon-wrapper relative">
                                    <div class="hexagon {{ config('constants.type_gold')[$itemBetween['type']] }}">
                                        <div class="avt"
                                            style="background-image: url({{ Voyager::image($itemBetween->thumb) }})">
                                        </div>
                                    </div>
                                    <div class="name-character">{{ $itemBetween['description']}}</div>
                                </div>
                                @endforeach
                                <!--  -->
                            </div>
                            <div class="note-tip text-uppercase">Giữa trận</div>
                        </div>
                    </div>
                    <p class="title-info-corp pt-2">Trang bị ưu tiên (đi chợ)</p>
                    <div class="col-md-12">
                        <div class="tip">
                            <div class="list-item-tier">
                            @foreach($champion->tierlists_item as $key => $itemTier)
                            <div class="hexagon-wrapper relative">
                                <div class="hexagon">
                                    <div class="avt"
                                        style="background-image: url({{ Voyager::image($itemTier->thumb) }})">
                                    </div>
                                </div>
                            </div>
                            @if($loop->last)
                            @else
                                <img class="img-item-tier" src="{{ asset('assets/front/images/icon-left.svg')}}">
                            @endif
                            @endforeach
                            </div>
                            
                        </div>
                    </div>
                    <p class="title-info-corp pt-2">Trang bị carry</p>
                    <div class="col-md-6">
                        <div class="tip">
                            @foreach($itemChampEnd as $key => $itemEnd)
                                @if ($loop->first)
                                <div class="list-item-tier">
                                    <div class="hexagon-wrapper relative me-2">
                                            <div class="hexagon {{ config('constants.type_gold')[$itemEnd['type']] }}">
                                                <div class="avt"
                                                    style="background-image: url({{ Voyager::image($itemEnd->thumb) }})">
                                                </div>
                                            </div>
                                    <div class="name-character">{{ $itemEnd['description']}}</div>
                                </div>
                                <img class="img-item-tier" src="{{ asset('assets/front/images/icon-left.svg')}}">
                                @foreach($itemEnd['items'] as $itemChamp)
                                    <div class="hexagon-wrapper relative">
                                            <div class="hexagon">
                                                <div class="avt"
                                                    style="background-image: url({{ Voyager::image($itemChamp['thumb']) }})">
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                @endif
                               
                            @endforeach
                            </div>
                            <div class="note-tip text-uppercase">Carry đầu game</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tip">
                            @foreach($itemChampEnd as $key => $itemOrder)
                                @if ($loop->first)
                                @else
                                <div class="list-item-tier mb-2">
                                    <div class="hexagon-wrapper relative me-2">
                                        <div class="hexagon {{ config('constants.type_gold')[$itemOrder['type']] }}">
                                            <div class="avt"
                                                style="background-image: url({{ Voyager::image($itemOrder->thumb) }})">
                                            </div>
                                        </div>
                                        <div class="name-character">{{ $itemOrder['description']}}</div>
                                    </div>
                                    <img class="img-item-tier" src="{{ asset('assets/front/images/icon-left.svg')}}">
                                    @foreach($itemOrder['items'] as $itemChamp)
                                        <div class="hexagon-wrapper relative">
                                            <div class="hexagon">
                                                <div class="avt"
                                                    style="background-image: url({{ Voyager::image($itemChamp['thumb']) }})">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            @endforeach
                            <div class="note-tip text-uppercase">Carry giữa và cuối game</div>
                        </div>
                    </div>
                    <p class="title-info-corp pt-2">Xem thêm tại <a href="{{ $champion['link'] }}"> kênh youtube</a></p>
                </div>
                <!-- <div class="row">
                    <div class="col-md-3 text-center py-5">
                        <p class="title-info-corp">Các Giai đoạn</p>
                        <div class="tip">
                            <p>{{$champion['stage2']}}</p>
                            <div class="note-tip text-uppercase">Đầu game</div>
                        </div>
                        <div class="tip">
                            <p>{{$champion['stage3']}}</p>
                            <div class="note-tip text-uppercase">Giữa game</div>
                        </div>
                        <div class="tip">
                            <p>{{$champion['stage4']}}</p>
                            <div class="note-tip text-uppercase">Cuối game</div>
                        </div>
                    </div>
                  
                </div> -->
            </div>
        </div>
        <a class="btn-close-tab"onclick="hideContentTier()"><i class="fa-solid fa-xmark"></i></a>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <h2>Profile</h2>
        <p>Please check our more design @ <a target="_blank"
                href="https://codepen.io/Gaurav-Rana-the-reactor">Codepen</a></p>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <h2>Contact</h2>
        <p>Please check our more design @ <a target="_blank"
                href="https://codepen.io/Gaurav-Rana-the-reactor">Codepen</a></p>
    </div>
</div>
@endisset
