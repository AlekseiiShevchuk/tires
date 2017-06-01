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
	@include('partials.message')
    @yield('content')
    @yield('js_scripts')
</div>

@include('partials.footer')

<!-- /#wrapper -->
@include('partials.front_js')
</body>
</html>
