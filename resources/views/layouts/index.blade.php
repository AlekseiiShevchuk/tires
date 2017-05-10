<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

<div id="wrapper">

    <div class="container-fluid">
            @yield('content')
    </div>

</div>
<!-- /#wrapper -->
@include('partials.javascripts')
</body>
</html>