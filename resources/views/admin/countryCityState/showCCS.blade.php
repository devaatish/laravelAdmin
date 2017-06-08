@extends('admin.layout.default')
@section('content')

<!-- BEGIN CONTENT BODY -->
<div class="page-content">
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="#">Country-State-City</a>
				<i class="fa fa-circle"></i>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->

	<div class="row">
		<div class="col-md-12">
		<!-- BEGIN PORTLET-->
			<div class="portlet light form-fit bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<i class="icon-social-dribbble font-green"></i>
						<span class="caption-subject bold uppercase">Country State City</span>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form class="form-horizontal form-row-seperated">
						<div class="form-body">
						    <div class="form-group">
						        <label class="control-label col-md-3" for="title">Select Country:</label>
						        <div class="col-md-4">
						        	{!! Form::select('country', $countries,'',array('class'=>'bs-select form-control','id'=>'country','data-show-subtext'=>'true','data-live-search'=>'true'));!!}
						        </div>
						    </div>

						    <div class="form-group">
						        <label class="control-label col-md-3" for="title">Select State:</label>
						        <div class="col-md-4">
						        	<select name="state" id="state" class="form-control"></select>
						        </div>
						    </div>
						 
						    <div class="form-group">
						        <label class="control-label col-md-3" for="title">Select City:</label>
						        <div class="col-md-4">
						        	<select name="city" id="city" class="form-control"></select>
						        </div>
						    </div>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
		<!-- END PORTLET-->
		</div>
	</div>
</div>
<!-- END CONTENT BODY -->

<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('AdminPanel/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });

     $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('AdminPanel/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>

@stop