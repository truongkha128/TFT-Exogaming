@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
		<div class="container">
			<div class="flex flex-col h-fit items-center flex-wrap justify-evenly gap-4 mt-8">
				<div class="flex flex-row items-center h-fit w-fit md:mr-20 max-w-fit">
				<div class="mr-2 mb-4"><img src="{{ asset('assets/front/images/banner-tierlist.jpg')}}" class="w-full h-full"
							alt="TFT Academy Logo">
					</div>
				</div>
				<div class="text-white" data-svelte-h="svelte-we34qb">Giới thiệu bảng xếp hạng mới nhất cho mỗi Đội hình một cách tỉ mỉ do các chuyên gia TFT của chúng tôi.
					<!-- <span class="text-yellow-500">Dishsoap</span>
					and
					<span class="text-yellow-500">Frodan</span>. -->
				</div>
				@if(!empty($rankS))
				<div class="d-md-flex g-2 tabs-tier">
					<div class="tier tier-s">
						<h3>LỖI</h3>
					</div>
					<div class="w-100 h-100">
						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							@foreach($rankS as $key => $item)
								<li class="nav-item" role="presentation">
									<button class="nav-link text-primary fw-semibold item-tierlist position-relative tierlist-detail" id="pills-home-tab-{{ $item['id'] }}"
										data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
										aria-controls="pills-home" aria-selected="false" data-tierlistid="{{ $item['id'] }}">
										<!-- Team 1  -->
										<div class="hexagon-wrapper relative">
											<div class="hexagon {{ config('constants.type_gold')[$item['type_gold']] }}">
												<div class="avt" style="background-image: url({{ Voyager::image($item->thumb) }})">
												</div>
											</div>
											<!-- <div class="corp b-1-money"
												style="background-image: url({{ asset('assets/front/images/icon-bantia.webp')}})"></div> -->
											<img class="icon-status" src="{{ config('constants.type_rank')[$item['type_rank']] }}">
										</div>
										<!--  -->
									</button>
								</li>
							@endforeach
						</ul>

					</div>
				</div>
				<div id="tierlist-champions" class="factuly show-tier" style="display: none;">
					@include('frontend.tft.homepage.partials.detail-tierlist')
				</div>
				@endif
				<div>
					@if(!empty($rankA))
					
					<div class="d-md-flex g-2 tabs-tier">
					<div class="tier tier-a">
						<h3>CHƠI!</h3>
					</div>
					<div class="w-100 h-100">
						<ul class="nav nav-pills" id="pills-tab" role="tablist">
						@foreach($rankA as $key => $itemA)
								<li class="nav-item" role="presentation">
									<button class="nav-link text-primary fw-semibold item-tierlist position-relative tierlist-detail" id="pills-a-tab-{{ $itemA['id'] }}"
										data-bs-toggle="pill" data-bs-target="#pills-a" type="button" role="tab"
										aria-controls="pills-a" aria-selected="false"  data-tierlistaid="{{ $itemA['id'] }}">
										<!-- Team 1  -->
										<div class="hexagon-wrapper relative">
											<div class="hexagon {{ config('constants.type_gold')[$itemA['type_gold']] }}">
												<div class="avt" style="background-image: url({{ Voyager::image($itemA->thumb) }})">
												</div>
											</div>
											<!-- <div class="corp b-1-money"
												style="background-image: url('../images/icon-bantia.webp')"></div> -->
											<img class="icon-status" src="{{ config('constants.type_rank')[$itemA['type_rank']] }}">
										</div>
										<!--  -->
									</button>
								</li>
						@endforeach
						</ul>
					</div>
					@endif
				</div>
					<div id="tierlist-rank-a" class="factuly show-tier" style="display: none;">
						@include('frontend.tft.homepage.partials.tierlist-a')
					</div>
				</div>
				<div>
					@if(!empty($rankB))
					<div class="d-md-flex g-2 tabs-tier">
						<div class="tier tier-b">
							<h3>ỔN</h3>
						</div>
						<div class="w-100 h-100">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
							@foreach($rankB as $key => $itemB)
									<li class="nav-item" role="presentation">
										<button class="nav-link text-primary fw-semibold position-relative item-tierlist tierlist-detail" id="pills-b-tab-{{ $itemB['id'] }}"
											data-bs-toggle="pill" data-bs-target="#pills-b" type="button" role="tab"
											aria-controls="pills-b" aria-selected="false"  data-tierlistbid="{{ $itemB['id'] }}">
											<!-- Team 1  -->
											<div class="hexagon-wrapper relative">
												<div class="hexagon {{ config('constants.type_gold')[$itemB['type_gold']] }}">
													<div class="avt" style="background-image: url({{ Voyager::image($itemB->thumb) }})">
													</div>
												</div>
												{{-- <div class="corp b-1-money"
													style="background-image: url('../images/icon-bantia.webp')"></div> --}}
												<img class="icon-status" src="{{ config('constants.type_rank')[$itemB['type_rank']] }}">
											</div>
											<!--  -->
										</button>
									</li>
							@endforeach
							</ul>
						</div>
					</div>
					<div id="tierlist-rank-b" class="factuly show-tier" style="display: none;">
						@include('frontend.tft.homepage.partials.tierlist-b')
					</div>
					@endif
				</div>


			</div>
		</div>
	</section>
@endsection
@push('scripts')
    <script type="text/javascript">
		$('.tierlist-detail').on('click', function() {
			$('.item-tierlist').removeClass('active');
			$('.show-tier').hide();
			if($(this).hasClass('item-tierlist')){
				$(this).addClass('active');
				var tierlistId = $(this).data("tierlistid");
				var tierlistAId = $(this).data("tierlistaid");
				var tierlistBId = $(this).data("tierlistbid");
				   $.ajax({
				      type: 'POST',
				      url: '{{ route('ajaxTierList') }}',
				      data: {
				         'tierlistId' : tierlistId,
						 'tierlistAId' : tierlistAId,
						 'tierlistBId' : tierlistBId,
				         '_token': $('meta[name="csrf-token"]').attr('content')
				      },
				      datatype: 'html',
				      success: function(data) {
				            if(data.success == true) {
				            $('#tierlist-champions').html(data.html);
							document.getElementById("tierlist-champions").style.display = 'block';
				            }else if(data.success_rankA == true) {
				            $('#tierlist-rank-a').html(data.html);
							document.getElementById("tierlist-rank-a").style.display = 'block';
				            }else if(data.success_rankB == true) {
				            $('#tierlist-rank-b').html(data.html);
							document.getElementById("tierlist-rank-b").style.display = 'block';
				            }
				      },
					
				   });
			 }
		});
		
    </script>
@endpush