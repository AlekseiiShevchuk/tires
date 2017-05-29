<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="b-page">

  @include('partials.slider')
  @include('partials.top-header')
  @include('partials.search')
  @include('partials.links_collection_1')

<div id="wrapper">

    <div class="container-fluid product-wrap">
            @yield('content')
            @include('partials.footer')
    </div>

</div>

@include('partials.show_tire_product_js')
@yield('js_scripts')

</body>
</html>
