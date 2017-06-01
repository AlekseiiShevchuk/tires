<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="b-page">

@include('partials.slider')
@include('partials.top-header')

<div id="wrapper">
    @yield('content')
</div>

@include('partials.footer')

<!-- /#wrapper -->
@include('partials.front_js')
</body>
</html>
