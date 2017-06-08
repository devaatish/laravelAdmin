<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta charset="utf-8" id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="It is a admin panel scaffold with complusory activities.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">  

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('theme/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('theme/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('theme/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('theme/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> 
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
       
</head>
    <!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

@include('admin.layout.partials.header')

<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        
        @include('admin.layout.partials.menu')

    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
          @yield('content')
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <!-- END QUICK SIDEBAR -->

</div>
<!-- END CONTAINER -->

@include('admin.layout.partials.footer')
 <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('theme/assets/global/plugins/jquery.min.js ') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap/js/bootstrap.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/js.cookie.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/jquery.blockui.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/uniform/jquery.uniform.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js ') }}" type="text/javascript"></script>
    
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-markdown/lib/markdown.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/global/plugins/bootstrap-summernote/summernote.min.js ') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('theme/assets/global/scripts/app.min.js ') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- FOR EDITOR SCRIPTS -->
    <script src="{{ asset('theme/assets/pages/scripts/components-editors.min.js ') }}" type="text/javascript"></script>
    <!-- END FOR EDITOR SCRIPTS -->

    <script src="{{ asset('theme/assets/pages/scripts/components-bootstrap-select.min.js') }}" type="text/javascript"></script>

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('theme/assets/layouts/layout/scripts/layout.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/layouts/layout/scripts/demo.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/layouts/global/scripts/quick-sidebar.min.js ') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>