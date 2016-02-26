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
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" id="jupiter-cms-app">

        <div class="login-box" id="jupiter-login-box">

                <h4 class="text-center">
                    <p><i class="fa fa-rocket"></i> Jupiter</p>
                    <small>Content Management System</small>
                </h4>

                <hr>

                @include('jupiter::partials.errors')

                <form action="{{ url('/login') }}" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Sign in</button>

                </form>

        </div>

        <script src="{{ asset('js/min.js') }}" type="text/javascript"></script>

    </body>
</html>





