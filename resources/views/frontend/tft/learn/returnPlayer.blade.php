@extends('frontend.tft.layouts.master')
@section('content')
<section class="main">
        <div class=" mt-5">
            <div class="text-center">
                <img class="title-page" src="{{ asset('assets/front/images/returningplayers.svg')}}">
                <p class="description-page text-center fw-bold">A page dedicated to players coming back to Teamfight
                    Tactics. Catch up on the latest set and hop back into the game!</p>
            </div>
            
            <ul class="nav my-4 justify-content-center tabs-quarter">
                <li class="nav-item">
                    <a class="nav-link" href="#set1">Set 1: Base Set</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set2">Set 2: Rise of the Elements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set3">Set 3: Galaxies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set4">Set 4: Fates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set5">Set 5: Reckoning</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set6">Set 6: Gizmos and Gadgets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set7">Set 7: Dragonlands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set8">Set 8: Monsters Attack</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set9">Set 9: Runeterra Reforged</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set9_5">Set 9.5: Support Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set10">Set 10: Remix Rumble</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#set11">Set 11: Inkborn Fables</a>
                </li>
            </ul>

        </div>
        <div class="img-quarter" id="set1">
            <img src="{{ asset('assets/front/images/set1.webp')}}">
        </div>
        <div class="img-quarter" id="set2">
            <img src="{{ asset('assets/front/images/set2.webp')}}">
        </div>
        <div class="img-quarter" id="set3">
            <img src="{{ asset('assets/front/images/set3.webp')}}">
        </div>
        <div class="img-quarter" id="set4">
            <img src="{{ asset('assets/front/images/set4.webp')}}">
        </div>
        <div class="img-quarter" id="set5">
            <img src="{{ asset('assets/front/images/set5.webp')}}">
        </div>
        <div class="img-quarter" id="set6">
            <img src="{{ asset('assets/front/images/set6.webp')}}">
        </div>
        <div class="img-quarter" id="set7">
            <img src="{{ asset('assets/front/images/set7.webp')}}">
        </div>
        <div class="img-quarter" id="set8">
            <img src="{{ asset('assets/front/images/set8.webp')}}">
        </div>
        <div class="img-quarter" id="set9">
            <img src="{{ asset('assets/front/images/set9.webp')}}">
        </div>
        <div class="img-quarter" id="set9_5">
            <img src="{{ asset('assets/front/images/set9_5.webp')}}">
        </div>
        <div class="img-quarter" id="set10">
            <img src="{{ asset('assets/front/images/set10.webp')}}">
        </div>
        <div class="img-quarter" id="set11">
            <img src="{{ asset('assets/front/images/set11.webp')}}">
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
    </script>
@endpush