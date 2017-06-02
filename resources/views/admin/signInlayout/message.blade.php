@extends('admin.signInlayout.loginDefault')
@section('content') 
<div class="col-md-6 login-container bs-reset logMidOtrCont">
<div class="login-content logMidInrCont">
    <h1 class="logHdr">Admin Panel</h1>
 
    <div class="row alert alert-danger display-hide">
        <div class="col-xs-6">
            <span>{{$msg}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 text-right">
           <button type="button" id="back-btn" class="btn grey btn-default" onclick="{{url('AdminPanel')}}">Back</button>
        </div>
    </div>


</div>

</div>
@stop