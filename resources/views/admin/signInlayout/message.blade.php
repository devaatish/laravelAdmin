@extends('admin.signInlayout.loginDefault')
@section('content') 
<div class="col-md-6 login-container bs-reset logMidOtrCont">
<div class="login-content logMidInrCont">
    <h1 class="logHdr">Admin Panel</h1>
    <br><br>
    <div class="row">
        <div class="col-xs-12 font-green">
            <span>{{$msg}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right">
           <button type="button" id="back-btn" class="btn grey btn-default" onclick="location.href = '{{url('AdminPanel')}}';">Back</button>
        </div>
    </div>


</div>

</div>
@stop