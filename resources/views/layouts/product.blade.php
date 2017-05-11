<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

@include('partials.slider')

<div id="wrapper">

    <div class="container-fluid product-wrap">
            @yield('content')
            @include('partials.footer')
    </div>

</div>

@include('partials.show_tire_product_js')

</body>
</html>