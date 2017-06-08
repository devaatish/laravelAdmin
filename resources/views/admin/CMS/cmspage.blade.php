@extends('admin.layout.default')
@section('content')
<link href="{{ asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css ') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css ') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('theme/assets/global/plugins/bootstrap-summernote/summernote.css ') }}" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">CMS</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->

    <!-- END PAGE HEADER-->
   <!--  <div class="row">
        <div class="col-md-12">
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Summernote Editor</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-bordered" action="{{url('AdminPanel/saveCMS')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-body">
                            <div class="form-group last">
                                <label class="control-label col-md-2">Default Editor</label>
                                <div class="col-md-10">
                                    <div name="summernote" id="summernote_1"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn green">
                                        <i class="fa fa-check"></i> Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light form-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Content Management System</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-bordered" action="{{url('AdminPanel/saveCMS')}}" method="post">
                        {!! csrf_field() !!}
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Content 1</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" name="editorval1" rows="6"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-2">Content 2</label>
                                <div class="col-md-10">
                                    <textarea class="wysihtml5 form-control" name="editorval2" rows="6"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn red">
                                        <i class="fa fa-check"></i> Submit</button>
                                    <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->


@stop