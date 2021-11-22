<html>
<head>
    <title>Hermes Fish Boutique</title>
    <link rel="stylesheet" href="{{ asset('polished.min.css')}}">
    <link rel="stylesheet" href="{{ asset('custom.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        hr {
            margin: 2rem 0;
        }
        .main-div{
            position: relative;
        }
        .order-for-checkout{
            position: absolute;
            top: 0;
            right: 0;
            background-color: #afdf3b;
            min-width: 20px;
            text-align: center;
            border-radius: 50%;
        }
    </style>
</head>

<body>

<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex">
        <div class="polished-sidebar bg-light col-12 col-md-2 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">
            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('home')}}"><span class="oi oi-home"></span>Dashboard</a></li>
                <li class="{{ request()->is('products') ? 'active' : '' }}"><a href="{{route('products')}}"><span class="oi oi-puzzle-piece"></span></span>Products</a></li>
                <li class="{{ request()->is('review-request') ? 'active' : '' }}"><a href="{{route('review.request')}}"><span class="oi oi-dashboard"></span>Reviews</a></li>
                <li class="{{ request()->is('question-request') ? 'active' : '' }}"><a href="{{route('question.request')}}"><span class="oi oi-pie-chart"></span>Questions</a></li>
                <li class="{{ request()->is('settings') ? 'active' : '' }}"><a href="{{route('settings')}}"><span class="oi oi-pie-chart"></span>Settings</a></li>
            </ul>
        </div>
            @yield('content')
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@if(\Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_enabled'))
    <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
    <script src="https://unpkg.com/@shopify/app-bridge-utils{{ \Osiset\ShopifyApp\Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
    <script
        @if(\Osiset\ShopifyApp\Util::getShopifyConfig('turbo_enabled'))
        data-turbolinks-eval="false"
        @endif
    >
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var utils = window['app-bridge-utils'];
        var createApp = AppBridge.default;
        var app = createApp({
            apiKey: "{{ \Osiset\ShopifyApp\Util::getShopifyConfig('api_key', $shopDomain ?? Auth::user()->name ) }}",
            shopOrigin: "{{ $shopDomain ?? Auth::user()->name }}",
            host: "{{ \Request::get('host') }}",
            forceRedirect: true,
        });
    </script>

    @include('shopify-app::partials.token_handler')
    @include('shopify-app::partials.flash_messages')
@endif

@yield('scripts')

</body>

</html>
