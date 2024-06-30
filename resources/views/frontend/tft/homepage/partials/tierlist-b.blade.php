
@if(@isset($championB) )
<div class="tab-content my-4" id="pills-tabContent">
    <div class="tab-pane fade tier-b-content active show" id="pills-b" role="tabpane2"
        aria-labelledby="pills-b-tab-{{ $championB['id'] }}">
        <div class="row">
            <div class="col-md-2">
                <div class="text-center info-corp">
                    <div class="hexagon-wrapper relative m-auto">
                        <div class="hexagon">
                            <div class="avt" style="background-image: url({{ Voyager::image($championB['thumb']) }})">
                            </div>
                        </div>
                        <div class="corp" style="background-image: url({{ Voyager::image($championB['core']) }})">
                        </div>
                    </div>
                    <div class="d-flex my-2 justify-content-center gap-2">
                        <div class="tier tier-b">
                            <h6 class="m-0">B</h6>
                        </div>
                        <div class="text-center">
                            <p class="text-uppercase m-0 fw-bold">{{ $championB['name'] }}</p>
                            <small class="text-danger text-uppercase fw-bold">{{ $championB['description']}}</small>
                        </div>
                    </div>
                    <div class="list-system">
                    @foreach($traits as $key => $trait)
                        <div class="item-system">
                            <img src="{{ Voyager::image($trait['trait']['thumb']) }}">
                            <p class="mb-0">{{ $trait['count'] }}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="list-core">
                        @foreach($championB->tierlists_augment as $augment)
                                <img src="{{ Voyager::image($augment->thumb) }}">
                        @endforeach
                    </div>
                    <div class="tip">
                        <p>{{$championB['tip']}}</p>
                        <div class="note-tip text-uppercase">TIP</div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="list-character justify-content-center">
                    <!-- Team 1  -->
                    @foreach($championB->tierlists_champion as $champion)
                    <div class="hexagon-wrapper relative">
                       <div class="hexagon {{ config('constants.type_gold')[$champion['type']] }}">
                           <div class="avt" style="background-image: url({{ Voyager::image($champion->thumb) }})">
                           </div>
                       </div>
                       <!-- <div class="three-star"><img src="{{ asset('assets/front/images/3-start.png')}}" alt=""></div> -->
                       <!-- <div class="name-character">Ashe</div> -->
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
                    <div class="col-md-6">
                        <p class="title-info-corp text-center">Tướng Đầu Trận</p>
                        <div class="list-character">
                            <!-- Team 1  -->
                            @foreach($championB->tierlists_early as $early)
                            <div class="hexagon-wrapper relative">
                                <div class="hexagon {{ config('constants.type_gold')[$early['type']] }}">
                                    <div class="avt"
                                        style="background-image: url({{ Voyager::image($early->thumb) }})">
                                    </div>
                                </div>
                                <div class="name-character">{{ $early['name']}}</div>
                            </div>
                            @endforeach
                            <!--  -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="title-info-corp text-center">Trang Bị Cần thiết</p>
                        <div class="list-item-tier">
                            @foreach($championB->tierlists_item as $key => $item)
                            <div class="hexagon-wrapper relative">
                                <div class="hexagon">
                                    <div class="avt"
                                        style="background-image: url({{ Voyager::image($item->thumb) }})">
                                    </div>
                                </div>
                            </div>
                            @if($key<3)
                            <img class="img-item-tier" src="{{ asset('assets/front/images/icon-left.svg')}}">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-center py-5">
                        <p class="title-info-corp">Các Giai đoạn</p>
                        <div class="tip">
                            <p>{{$championB['stage2']}}</p>
                            <div class="note-tip text-uppercase">Đầu game</div>
                        </div>
                        <div class="tip">
                            <p>{{$championB['stage3']}}</p>
                            <div class="note-tip text-uppercase">Giữa game</div>
                        </div>
                        <div class="tip">
                            <p>{{$championB['stage4']}}</p>
                            <div class="note-tip text-uppercase">Cuối game</div>
                        </div>
                    </div>
                    <div class="col-md-9 text-center py-5">
                        <p class="title-info-corp">VỊ TRÍ TƯỚNG</p>
                        <img src="{{ Voyager::image($championB->image_team) }}" class="w-100">
                    </div>
                </div>

            </div>
        </div>
        <button class="btn-close-tab" onclick="hideContentTier()"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpane2" aria-labelledby="pills-profile-tab">
        <h2>Profile</h2>
        <p>Please check our more design @ <a target="_blank"
                href="https://codepen.io/Gaurav-Rana-the-reactor">Codepen</a></p>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpane2" aria-labelledby="pills-contact-tab">
        <h2>Contact</h2>
        <p>Please check our more design @ <a target="_blank"
                href="https://codepen.io/Gaurav-Rana-the-reactor">Codepen</a></p>
    </div>
</div>
@endif