<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]>
<html> <![endif]-->
<!--[if !IE]><!-->
<html><!-- <![endif]-->
<head>
    <title>Loginnn</title>

    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"/>

    <!--
    **********************************************************
    In development, use the LESS files and the less.js compiler
    instead of the minified CSS loaded by default.
    **********************************************************
    <link rel="stylesheet/less" href="../assets/less/admin/module.admin.page.login.less" />
    -->

    <!--[if lt IE 9]>{!! Html::style('css/bootstrap.min.css') !!}<![endif]-->

    {!! Html::style('css/module.admin.page.login.min.css') !!}
            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}
    {!! Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') !!}

    <![endif]-->


    {!! Html::script('js/jquery.min.js?v=v1.2.3') !!}
    {!! Html::script('js/jquery-migrate.min.js?v=v1.2.3') !!}
    {!! Html::script('js/modernizr.js?v=v1.2.3') !!}
    {!! Html::script('js/less.min.js?v=v1.2.3') !!}
    {!! Html::script('js/excanvas.js?v=v1.2.3') !!}
    {!! Html::script('js/ie.prototype.polyfill.js?v=v1.2.3') !!}
</head>
<body class=" loginWrapper">


<div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Login to your
        Account</h4>

    <div class="login spacing-x2">
        <div class="placeholder text-center"><i class="fa fa-lock"></i></div>
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body innerAll">
                    @if((Session::get('global')))
                        <p>{{ Session::get('global') }}</p>
                    @endif
                    <form role="form" action="{{ Route('admin-login-post') }}" method="post">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"placeholder="Enter email">
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="Password">
                            @if($errors->has('password'))
                                {{ $errors->first('passwords') }}
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember my details
                            </label>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <a href="signup.html?lang=en" class="btn btn-info">Create a new account? <i class="fa fa-pencil"></i> </a>
        </div>
    </div>
</div>


    <!-- Global -->
    <script>
        var basePath = '',
                commonPath = '../assets/',
                rootPath = '../',
                DEV = false,
                componentsPath = '../assets/components/';

        var primaryColor = '#cb4040',
                dangerColor = '#b55151',
                infoColor = '#466baf',
                successColor = '#8baf46',
                warningColor = '#ab7a4b',
                inverseColor = '#45484d';

        var themerPrimaryColor = primaryColor;
    </script>
{!! Html::script('js/bootstrap.min.js?v=v1.2.3') !!}
{!! Html::script('js/jquery.nicescroll.min.js?v=v1.2.3') !!}
{!! Html::script('js/breakpoints.js?v=v1.2.3') !!}
{!! Html::script('js/animations.init.js?v=v1.2.3') !!}
{!! Html::script('js/jquery.cookie.js?v=v1.2.3') !!}
{!! Html::script('js/core.init.js?v=v1.2.3') !!}
</body>
</html>