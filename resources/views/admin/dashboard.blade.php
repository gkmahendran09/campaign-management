@extends('layouts.admin')

@section('title', 'Dashboard')

@section('dashboard-active', 'active')

@push('styles')

@endpush

@section('main')
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="row">
        <div class="col-sm-5">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">New Campaign</div>
            </div>
            <div class="panel-body">
              <p class="lead">
                Start with a new campaign
              </p>
              <div class="well text-right">
                <form method="post" action="{{route('api-create-campaign')}}" role="form" class="" id="create_campaign">
                  {{csrf_field()}}
                  <div class="form-group">
                    <input type="text" placeholder="Campaign Name" name="campaign_name" required="true" class="form-control">
                  </div>
                    <input type="submit" class="btn btn-primary" value="Start">
                </form>
                <span class="text-danger" data-error-msg-for="campaign_name"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <p class="lead text-center">
            <span class="hidden-xs"><br><br><br><br></span>
            (OR)
          </p>
        </div>
        <div class="col-sm-5">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="panel-title">Existing Campaign</div>
            </div>
            <div class="panel-body">
              <p class="lead">
                Choose from an existing campaign
              </p>
              <div class="well">
                <div id="campaign_id_container" class="text-right">
                  <i class="fa fa-spinner fa-spin"></i> Loading Campaigns...
                </div>
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
    // submission of new campaign form
  	$("#create_campaign").on("submit", function(e) {

  		e.preventDefault();
      var type = $(this).attr('method');
      var url = $(this).attr('action');
      var data = $(this).serialize();

      //triggerAjaxRequest(type, url, data, onSuccess(), onError())
      triggerAjaxRequest(type, url, data, function(data){window.location = data.redirect;}, defaultAjaxErrorHandler);


  	});

    //Go to build
    $("body").on("click", "#goToBuild", function() {
      var cid = $('#campaign_id').val();
      if(cid == "") {
        alert("Invalid Campaign ID");
      } else {
        var url = "{{route('build', ['campaign_id' => ':id'])}}";
        url = url.replace(':id', cid);
        window.location = url;
      }
    });

    //Load All Available Campaigns
    var type = "get";
    var url = "{{route('api-get-campaign')}}";
    var data = "";

    triggerAjaxRequest(type, url, data,
      function(data){
        var response = data.message;
        if(data.message == "") {
          $('#campaign_id_container').html('No Campaigns');
        } else {
          var strBuild = '<div class="form-group">';
          strBuild += '<select name="campaign_id" id="campaign_id" required="true" class="form-control">';
          $.each(response, function(key, value) {
            strBuild += '<option value="' + value.campaign_id + '">' + value.campaign_title + '</option>';
          });
          strBuild += '</select></div>';
          strBuild += '<input type="button" class="btn btn-primary" value="Start" id="goToBuild">';

          $('#campaign_id_container').html(strBuild);
        }
      }, function(data){});


  });
</script>
@endpush
