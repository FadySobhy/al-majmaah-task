<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title',  config('app.name') )</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png')}}">

    <!-- App css -->
    <link href="{{ url('assets') }}/css/bootstrap.min.css?var=1" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets') }}/css/icons.min.css?var=1" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets') }}/css/app.min.css?var=1" rel="stylesheet" type="text/css"/>

    <!-- Font Awesome CDN -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
</head>

<body class="menubar-light topbar-dark bg-soft-dark">
@include('inc.header')
<!-- Begin page -->
{{--<div class="wrapper">--}}
    <div class="container mt-4 justify-content-center">
        <div class="content-div">
            @yield('content')
        </div>
    </div>
{{--</div>--}}

@include('inc.footer')

<!-- Vendor js -->
<script src="{{ url('assets') }}/js/vendor.min.js?var=1"></script>
</body>
</html>
