<header class="d-md-flex justify-content-between">
    <img class="logo" style="cursor: pointer;" src="{{ asset('assets/front/images/logo.svg')}}" onclick="window.location.href='/'">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav g-3">
                    <li class="nav-item">
                        <a class="nav-link {{$pageGroup == 2 ? 'active' : ''}}" href="{{ route('tierList') }}"><img class="icon-menu" src="{{ asset('assets/front/images/ranking.svg')}}">Tierlist</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link {{$pageGroup == 3 ? 'active' : ''}}" href="#">Study Hall</a>
                    </li> -->
                    <!-- <li class="nav-item">
                    <div class="dropdown">
                            <a class="nav-link dropdown-toggle {{$pageGroup ==  3 ? 'active' : ''}}" href="#"data-bs-toggle="dropdown" aria-expanded="false"><img class="icon-menu" src="{{ asset('assets/front/images/tv.svg')}}">Watch</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('guides') }}">Guides</a></li>
                              <li><a class="dropdown-item" href="{{ route('comps') }}">Comps</a></li>
                            </ul>
                          </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle {{$pageGroup == 4 ? 'active' : ''}}" href="#"data-bs-toggle="dropdown" aria-expanded="false"><img class="icon-menu" src="{{ asset('assets/front/images/graduation.svg')}}"> Learn</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('learn') }}">Set 11</a></li>
                              <li><a class="dropdown-item" href="{{ route('newPlayer') }}">New Players</a></li>
                              <li><a class="dropdown-item" href="{{ route('returnPlayer') }}">Returning Players</a></li>
                            </ul>
                          </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link"><img class="icon-menu" src="{{ asset('assets/front/images/graduation.svg')}}">Discord</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</header>