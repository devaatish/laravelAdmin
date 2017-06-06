@extends('admin.layout.default')
@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN THEME PANEL -->

<!-- END THEME PANEL -->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">User</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit</span>
        </li>
    </ul>
    
</div>
<!-- END PAGE BAR -->


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Edit User</span>
                </div>
                 <div class="actions">
                    <div class="btn-group btn-group-devided ">
                        <a href="{{url('AdminPanel/datatable')}}" class="btn btn-xs btn-primary">Show</a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">

            @if(Session::has('message'))
                <?php $errorMsg = Session::get('message'); ?>
                @foreach($errorMsg as $key=>$err)
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    <button class="close" data-close="alert"></button>
                    <span>{{ $err }}</span>
                </div><br>
                @endforeach
            @endif
                <!-- BEGIN FORM-->
                <form action="{{ url('AdminPanel/UpdateUser')}}" id="form_sample_1"  class="form-horizontal" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$data->id}}" name="id">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Username" name="name" value="{{$data->name}}" required data-required="1" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input disabled placeholder="Email" name="email" value="{{$data->email}}" required type="text" class="form-control" /> </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-md-3">Password
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="password" autocomplete="off" placeholder="Password" name="password" value="{{$data->password}}" required class="form-control" /> </div>
                        </div> -->
                        
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

</div>
<!-- END CONTENT BODY -->
@stop