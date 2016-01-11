@extends('layouts.admin')

@section('title', 'Manage Forms')

@push('styles')

@endpush

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">Campaign Name: {{$data['campaign_title']}} <a class="btn btn-sm btn-default pull-right" href="{{route('build', ['campaign_id' => $data['campaign_id']])}}" title="Change Campaign"><i class="fa fa-list-alt"></i> Back to Campaign</a> <a class="btn btn-sm btn-default pull-right" href="{{route('dashboard')}}" title="Change Campaign"><i class="fa fa-pencil"></i> Change Campaign</a></div>
        </div>
        <div class="panel-body">
          <p class="lead">Manage Forms</p>
          <hr>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div id="form_id_container">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop


@push('scripts')
<script>
  $(document).ready(function() {

    loadForms();


    $("body").on("click", ".delete-form", function(e) {
      e.preventDefault();
      var go = confirm("Are you sure?, It will delete associated data?");
      if(go) {
        var form_id = $(this).attr("rel");
        var type = "get";
        var url = "{{route('api-delete-form', ['campaign_id' => $data['campaign_id'], 'form_id' => ':form_id'])}}";
        url = url.replace(':form_id', form_id);
        var data = "";
        var container = $('#form_id_container');

        triggerAjaxRequest(type, url, data,
          function(data){
            var response = data.message;
            if(data.message == "") {
              container.html('No Forms');
            } else {
              showModal("Success", data.message);
              loadForms();
            }
          }, function(data){});
      }

    });


  });

  function loadForms() {
    //Load All Forms belongs to selected Campaigns
    var type = "get";
    var url = "{{route('api-get-form', ['campaign_id' => $data['campaign_id']])}}";
    var data = "";
    var container = $('#form_id_container');

    triggerAjaxRequest(type, url, data,
      function(data){
        var response = data.message;
        if(data.message == "") {
          container.html('No Forms');
        } else {
          var strBuild = '<table class="table table-bordered"><thead><th>Form Name</th><th>Action</th></thead><tbody>';
          $.each(response, function(key, value) {
            strBuild += '<tr><td>' + value.form_title + '</td><td><a href="javascript:void(0);" class="delete-form btn btn-danger" rel = "' + value.form_id + '"><i class="fa fa-trash"></i> Delete</a></td></tr>';
          });
          strBuild += '</tbody></table>';

          container.html(strBuild);
        }
      }, function(data){});
  }
</script>
@endpush
