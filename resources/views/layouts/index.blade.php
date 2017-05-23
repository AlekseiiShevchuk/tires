<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

@include('partials.slider')
@include('partials.top-header')

<div id="wrapper">
  @include('partials.search')
  @include('partials.links_collection_1')
    @yield('content')
</div>

@include('partials.footer')

<!-- /#wrapper -->
@include('partials.front_js')
</body>
</html>
