@extends('admin.signInlayout.loginDefault')
@section('content') 
<div class="col-md-6 login-container bs-reset logMidOtrCont">
<!-- <img class="login-logo login-6" src="{{ asset('theme/assets/pages/img/login/login-invert.png') }}" /> -->
<div class="login-content logMidInrCont">
    <h1 class="logHdr">Admin Panel</h1> 
   <!--  <br><br>
    <h3 class="font-green logHdr"><b>Login</b></h3> -->

    <form action="{{ url('AdminPanel/Login')}}" class="login-form" method="post">
        {!! csrf_field() !!}
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Please fill all fields. </span>
        </div><br>
        @if(Session::has('alert-danger'))
            <?php $errorMsg = Session::get('alert-danger'); ?>
            @foreach($errorMsg as $key=>$err)
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span>{{ $err }}</span>
            </div><br>
            @endforeach
        @endif

        <div class="row">
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="username" value="" required/> </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" value="" required/> </div>
        </div>
        <div class="row">

           
            <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    {!! captcha_image_html('ContactCaptcha') !!}
                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" id="CaptchaCode" name="CaptchaCode" required>

                    @if ($errors->has('CaptchaCode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('CaptchaCode') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            
            <div class="col-sm-4">
                <div class="rem-password">
                    <p>Remember Me
                        <input type="checkbox" checked="checked" name="remember" class="rem-checkbox" />
                    </p>
                </div>
            </div>
            <div class="col-sm-8 text-right">
                <div class="forgot-password">
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>
                <button class="btn blue" type="submit">Sign In</button>
            </div>
            

        </div>
    </form>

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="{{url('AdminPanel/ForgotPassword')}}" method="post">
        {!! csrf_field() !!}
        <h3 class="font-green">Forgot Password ?</h3>
        <p> Enter your e-mail address below to get reset password link in your mail. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="" /> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
            <button type="submit" class="btn blue btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->

</div>
<div class="login-footer">
    <div class="row bs-reset">
        <!-- <div class="col-xs-5 bs-reset">
            <ul class="login-social">
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-social-dribbble"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-xs-7 bs-reset">
            <div class="login-copyright text-right">
                <p>Copyright &copy; Keenthemes 2015</p>
            </div>
        </div> -->
    </div>
</div>
</div>
@stop