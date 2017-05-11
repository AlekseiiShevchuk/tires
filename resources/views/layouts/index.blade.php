<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

@include('partials.slider')

<div id="wrapper">

    <div class="container-fluid index-wrap">
            @yield('content')
    </div>

</div>
<!-- /#wrapper -->
@include('partials.front_js')
</body>
</html>