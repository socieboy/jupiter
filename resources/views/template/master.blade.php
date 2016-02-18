<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Jupiter Content Management System - {{ date('Y') }}">
        <meta name="author" content="Francisco Sepulveda">
        <title>Jupiter - Content Management System</title>
        <meta name="X-CSRF-TOKEN" id="_token" value="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="{{ asset('css/min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="hold-transition skin-blue sidebar-mini" id="jupiter-cms-app">

        <div class="wrapper">
            @include('jupiter::template.sidebar')
            <div class="content-wrapper">
                <section class="content">
                    @yield('content')
                </section>
            </div>
        </div>

        <script src="{{ asset('js/min.js') }}" type="text/javascript"></script>
    </body>
</html>