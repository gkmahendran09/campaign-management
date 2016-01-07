@extends('layouts.admin')

@section('title', 'Build')

@push('styles')

@endpush

@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">Campaign Name: {{$data['campaign_title']}} <a class="btn btn-sm btn-default pull-right" href="{{route('dashboard')}}" title="Change Campaign"><i class="fa fa-list-alt"></i> Manage Forms</a> <a class="btn btn-sm btn-default pull-right" href="{{route('dashboard')}}" title="Change Campaign"><i class="fa fa-pencil"></i> Change Campaign</a></div>
        </div>
        <div class="panel-body">
          <p>Start creating a <strong>Form</strong> under this Campaign. Add required fields and click Save Form.</p>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <form method="post" action="" role="form" id="build_form">
                    {{csrf_field()}}
                    <div class="row">
                      <div class="col-md-3">
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="control-label " for="form_name">
                              Step 1:
                            </label>
                          </div>
                          <input class="form-control" id="form_name" name="form_name" type="text" required="true" placeholder="Enter Form name">
                          <span class="text-danger" data-error-msg-for="form_name"></span>
                        </div>
                      </div>
                      <div class="col-md-9" style="border-left: 1px solid #efefef;">
                        <div class="panel-body">
                          <div class="form-group ">
                            <label class="control-label " for="form_name">
                              Step 2:
                            </label>
                            Add Fields
                          </div>
                          <table class="table table-bordered" id="form_builder">
                            <thead>
                              <th>Field Friendly Name <a href="javascript:void(0);"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Display Name"></i></a></th>
                              <th>Field Datatype <a href="javascript:void(0);"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Datatype of field"></i></a></th>
                              <th><a href="javascript:void(0);" id="new_field" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> New</a></th>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <input type="text" required="true" class="form-control" placeholder="Friendly Name" name="field_name[]">
                                </td>
                                <td>
                                  <select required="true" name="field_datatype[]" class="form-control">
                                    <option value="text">Text</option>
                                    <option value="int">Number</option>
                                    <option value="date">Date</option>
                                  </select>
                                  <span class="text-danger" data-error-msg-for="field_datatype[]"></span>
                                </td>
                                <td>

                                </td>
                              </tr>

                            </tbody>
                          </table>

                          <br><br><br>
                          <input type="submit" value="Save Form" class="btn btn-success pull-right">
                        </div>
                      </div>
                    </div>
                  </form>
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

    $("body").on("click", "#new_field", function() {
      $("#form_builder").append(getTemplate());
    });

    $("body").on("click", "#delete_field", function() {
      $(this).closest('tr').remove();
    });

    // submission of new campaign form
  	$("#build_form").on("submit", function(e) {

  		e.preventDefault();

  		$.ajax({
  			type: $(this).attr('method'),
  			url: $(this).attr('action'),
  			data: $(this).serialize(),
  			dataType: "json",
  			success: function(data) {
          var url = data.previewURL;
          var modalData = '<div class="alert alert-success">' + data.message + '</div>';
          modalData += '<div class="row">';
          modalData += '<div class="col-md-6 col-md-offset-3">';
          modalData += '<a href="' + url + '" class="btn btn-primary pull-left">Preview Form</a>';
          modalData += '<button data-dismiss="modal" class="btn btn-default pull-right" type="button">New Form</button>';
          modalData += '</div>';
          showModal("Success", modalData);
  			},
  			error: function(data) {
          showErrorsForFormRequest(data.responseJSON);
  			}
  		});

  	});


  });

  function getTemplate() {
    var template = '<tr>';
    template += '<td><input type="text" name="field_name[]" placeholder="Friendly Name" class="form-control" required="true"></td>';
    template += '<td><select  class="form-control" name="field_datatype[]" required="true"><option value="text">Text</option><option value="int">Number</option><option value="date">Date</option></select></td>';
    template += '<td><a href="javascript:void(0);" class="btn btn-sm btn-danger" id="delete_field"><i class="fa fa-trash"></i> Delete</a></td>';
    template += '</tr>';

    return template;
  }
</script>
@endpush
