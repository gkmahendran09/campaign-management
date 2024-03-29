@extends('layouts.default')

@section('title', 'Home')

@push('styles')

@endpush



@section('main')
<div class="row">
  <div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        Start
      </div>
      <div class="panel-body">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-sm-4" style="border-right: 1px solid #efefef">

            <div class="form-group" id="campaign_container">

            </div>

            <div class="form-group" id="form_container">

            </div>
          </div>
          <div class="col-sm-8">
            <div id="preview_container">

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

    //Load All Available Campaigns
    var type = "get";
    var url = "{{route('api-get-campaign')}}";
    var data = "";
    var campaignContainer = $('#campaign_container');
    var formContainer = $('#form_container');
    var previewContainer = $('#preview_container');

    var c_id, f_id;

    campaignContainer.html(getAjaxLoader('Loading Campaign List...'));

    triggerAjaxRequest(type, url, data,
      function(data){
        if(data.message == "") {
          campaignContainer.html('No Campaigns');
          formContainer.html('');
          previewContainer.html('');
        } else {
          var response = data.message;
          var strBuild = '<p class="text-warning"><strong>Step 1:</strong></p>';
          strBuild += '<label>Select a Campaign</label>';
          strBuild += '<select name="campaign_id" id="campaign_list" required="true" class="form-control">';
          strBuild += '<option value="">Please Select a Campaign</option>';
          $.each(response, function(key, value) {
            strBuild += '<option value="' + value.campaign_id + '">' + value.campaign_title + '</option>';
          });
          strBuild += '</select>';

          campaignContainer.html(strBuild);
        }
      }, function(data){});

      $("body").on("change", "#campaign_list", function() {

        c_id = $(this).val();
        if( c_id == "" ) {
          alert("Please Select a Campaign");
        } else {
          formContainer.html(getAjaxLoader('Loading Form List...'));
          previewContainer.html('');
          var type = "get";
          var url = "{{route('api-get-form', ['campaign_id' => ':id'])}}";
          url = url.replace(':id', c_id);
          var data = "";


          triggerAjaxRequest(type, url, data,
            function(data){
              if(data.message == "") {
                formContainer.html('No Forms');
              } else {
                var response = data.message;
                var strBuild = '<p class="text-info"><strong>Step 2:</strong></p>';
                strBuild += '<label>Select a Form</label>';
                strBuild += '<select name="form_id" id="form_list" required="true" class="form-control">';
                strBuild += '<option value="">Please Select a Form</option>';
                $.each(response, function(key, value) {
                  strBuild += '<option value="' + value.form_id + '">' + value.form_title + '</option>';
                });
                strBuild += '</select>';

                formContainer.html(strBuild);
              }
            }, function(data){});
        }

      });

      $("body").on("change", "#form_list", function() {

        f_id = $(this).val();

        if( f_id == "" || c_id == "") {
          alert("Please Select a Form");
        } else {
          previewContainer.html(getAjaxLoader('Loading Form ...'));
          var type = "get";
          var url = "{{route('preview_form', ['campaign_id' => ':cid', 'form_id' => ':fid'])}}";
          url = url.replace(':cid', c_id);
          url = url.replace(':fid', f_id);
          var data = "";


          triggerAjaxRequest(type, url, data,
            function(data){
              if(data.html == "") {
                previewContainer.html('No Forms');
              } else {
                var strBuild = '<p class="text-success"><strong>Step 3: Submit</strong></p>' + data.html;
                previewContainer.html(strBuild);
              }
            }, function(data){});
        }

      });

      // submission of dynamic form
    	$("body").on("submit", "#dynamic_form", function(e) {        
    		e.preventDefault();
        var type = $(this).attr('method');
        var url = $(this).attr('action');
        var data = $(this).serialize();

        //triggerAjaxRequest(type, url, data, onSuccess(), onError())
        triggerAjaxRequest(type, url, data, dynamicFormOnSuccess, defaultAjaxErrorHandler);


    	});
  });
</script>

@endpush
