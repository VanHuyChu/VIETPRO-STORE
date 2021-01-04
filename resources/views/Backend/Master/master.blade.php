<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}backend/">
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="Awesome/css/all.css">
</head>

<body>
    <!-- header -->
    @include('Backend.Master.nav')
    <!-- header -->
    <!-- sidebar left-->
    @include('Backend.Master.sidebar')
    <!--/. end sidebar left-->
    @yield('main')

    @yield('category')
    @yield('category_edit')

    @yield('order_detail')
    @yield('order')
    @yield('order_succcess')

    @yield('product_list')
    @yield('product_edit')
    @yield('product_add')
    @yield('product_search')

    @yield('user_add')
    @yield('user_edit')
    @yield('user_list')
</body>

</html>
