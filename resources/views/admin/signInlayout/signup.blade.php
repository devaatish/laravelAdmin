@extends('admin.signInlayout.loginDefault')
@section('content') 
<div class="col-md-6 login-container bs-reset logMidOtrCont">
<div class="login-content logMidInrCont">
    <h1 class="logHdr">Admin Panel</h1>
    <h3 class="font-green logsubHdrReg"><b>Registeration<b></h3>
    
    <form action="{{ url('AdminPanel/SignupForm')}}" class="login-form" method="post">
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
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="name" value="" required/>
            </div>
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" value="" required/>
            </div>
            <!-- <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Confirm Password" name="confpassword" value="" required/>
            </div> -->
            <div class="col-xs-6">
                <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="email" value="" required/> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <button class="btn blue" type="submit">Sign Up</button>
            </div>
        </div>
    </form>

</div>
</div>
@stop