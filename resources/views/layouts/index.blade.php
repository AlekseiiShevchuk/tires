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
    @yield('content')
</div>

@include('partials.footer')

<!-- /#wrapper -->
@include('partials.front_js')
@yield('js_scripts')
</body>
</html>
