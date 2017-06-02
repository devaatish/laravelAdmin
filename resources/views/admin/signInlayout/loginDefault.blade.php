<!DOCTYPE html>
<html lang="en">

    <head>
        @include('admin.signInlayout.partials.headerScript')
        <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
    </head>

    <body class=" login">
        <div class="user-login-5 logBckClr">
            <div class="row bs-reset">
                @yield('content')
                <!-- <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div> -->
            </div>
        </div>
        <!-- BEGIN CORE PLUGINS -->
            @include('admin.signInlayout.partials.footerScript')
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>