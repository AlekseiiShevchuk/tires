<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

<div id="wrapper">

    <div class="container-fluid product-wrap">
            @yield('content')
    </div>

</div>

@include('partials.show_tire_product_js')

</body>
</html>