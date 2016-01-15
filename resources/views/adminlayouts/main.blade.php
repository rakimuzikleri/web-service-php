<!DOCTYPE html>
<html>
<head>
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
    <link rel="stylesheet/less" href="../assets/less/admin/module.admin.page.file_managers.less" />
    -->

    <!--[if lt IE 9]>    {!! Html::style('css/bootstrap.min.css') !!}<![endif]-->
    {!! Html::style('css/module.admin.page.file_managers.min.css') !!}
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

    <title>@yield('title')</title>
</head>

<body>
@include('adminLayouts.navigation')

<div id="content">
    @yield('content')
</div>

<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->

<div id="footer" class="hidden-print">

    <!--  Copyright Line -->
    <div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved.
        <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase FLAT PLUS on ThemeForest</a> -
        Current version: v1.2.3 / <a target="_blank" href="http://demo.mosaicpro.biz/flatplus/CHANGELOG.txt">changelog</a>
    </div>
    <!--  End Copyright Line -->

</div>
<!-- // Footer END -->
<!-- Global -->
<script>

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
{!! Html::script('js/file_manager/dropzone/assets/lib/js/dropzone.js?v=v1.2.3') !!}
{!! Html::script('js/holder.js?v=v1.2.3') !!}
{!! Html::script('js/sidebar.main.init.js?v=v1.2.3') !!}
{!! Html::script('js/sidebar.collapse.init.js?v=v1.2.3') !!}
{!! Html::script('js/jquery.cookie.js?v=v1.2.3') !!}
{!! Html::script('js/core.init.js?v=v1.2.3') !!}
<script>

    $(function() {
        Dropzone.options.myDropzone = {
            init: function () {
                this.on("success", function (file,responseText) {
                    $("#content").html("");
                    $("#content").html(responseText).hide().slideDown("slow");
                    console.log('ssd');
                });
            }
        };
    });
</script>
</body>
</html>
