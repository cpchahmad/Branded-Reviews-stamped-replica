<nav class=" p-0 navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="#">         <img src="{{asset('polished-logo.png')}}" alt="logo" width="42px">              Stamped</a>
    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button">
        <span class="oi oi-menu"></span>
    </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse admin-nav navbar-collapse custom-nav-collapse" id="navbarSupportedContent">
            <div class="text-center">
                <ul class="custom-ul navbar-nav mr-auto text-center">
                    <li class="nav-item active {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('home')}}">Dashboard<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active {{ request()->is('products') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('products')}}">Products<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active {{ request()->is('review-request') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('review.request')}}">Reviews</a>
                    </li>
                    <li class="nav-item active {{ request()->is('question-request') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('question.request')}}">Questions<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active {{ request()->is('settings') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('settings')}}">Settings<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

