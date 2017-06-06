@extends('admin.layout.default')
@section('content')
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Manage User</span>
                    </div>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided addbtn">
                        <a href="{{url('AdminPanel/AddUser')}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Add</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="users" class="table table-condensed table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('datatable.getUsers') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

});

function delUser(userId)
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
  {
    var link = "{{ url('AdminPanel/delUser') }}";
    
      $.ajax({
        type:"POST",
        data: {id : userId},
        url: link,
        async: false,
        headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
        success: function(response){ 

                var trClass = $("td.sorting_1:contains('"+userId+"')").parent().prop('className'); //console.log(trClass);
                $("tr."+trClass+":contains('"+userId+"')").hide();
                return false;

          }
      });
  }
  else
  {
    return false;
  }

}
</script>
<script type="text/javascript">
function userBan(userId)
{
    var x = confirm("Do you want to ban this user ?");
    var link = "{{url('AdminPanel/UserBan')}}";
    var img = "{{asset('theme/assets/img/user1.jpg')}}";
    var text = "";
    if(x)
    {
        $.ajax({

            type:"POST",
            data: {'user_id': userId},
            url: link,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response)
            {
                if(response.status)
                {
                    text = '<a onclick="userUnBan('+userId+')"><img title="to unban user" src="'+img+'" style="width:25px; height:25px;"></a>';
                    $("#ban_"+userId).html(text);
                    return false;
                }

            }

        });
    }
}

function userUnBan(userId)
{
    var x = confirm("Do you want to un ban this user ?");
    var link = "{{url('AdminPanel/UserUnBan')}}";
    var img = "{{asset('theme/assets/img/ban1.png')}}";
    var text = "";
    if(x)
    {
        $.ajax({

            type:"POST",
            data: {'user_id': userId},
            url: link,
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response)
            {
                if(response.status)
                {
                    text = '<a onclick="userBan('+userId+')"><img title="to ban user" src="'+img+'" style="width:25px; height:25px;"></a>';
                    $("#ban_"+userId).html(text);
                    return false;
                }

            }

        });
    }
}
</script>
<!-- END CONTENT BODY -->
@stop