@extends('admin.signInlayout.loginDefault')
@section('content') 
<div class="col-md-6 login-container bs-reset logMidOtrCont">
<div class="login-content logMidInrCont">
    <h1 class="logHdr">Admin Panel</h1>
    
    <!-- BEGIN RESET PASSWORD FORM -->
   
    <form action="{{ url('AdminPanel/UpdatePassword')}}" class="login-form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" value="{{$remember_token}}">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter new password and confirm password. </span>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Password" name="password" value="" required/> </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Confirm Password" name="password_confirmation" value="" required/> </div>
        </div>
        <div class="row">
            <div class="col-sm-8 text-right">
               <button class="btn blue" type="submit">Submit</button>
            </div>
        </div>
    </form>

    <!-- END RESET PASSWORD FORM -->

</div>

</div>
@stop