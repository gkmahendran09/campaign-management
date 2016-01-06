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
          <div class="panel-title">Campaign Name: {{$data['campaign_title']}} <a class="btn btn-sm btn-default pull-right" href="{{route('dashboard')}}" title="Change Campaign"><i class="fa fa-pencil"></i> Change Campaign</a></div>
        </div>
        <div class="panel-body">
          <p>Start creating a <strong>Form</strong> under this Campaign. Add required fields and click Save Form.</p>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <form method="post" action="" role="form">
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
                              <th>Field Key <a href="javascript:void(0);"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Unique name, less than 15 characters"></i></a></th>
                              <th>Field Friendly Name <a href="javascript:void(0);"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Display Name"></i></a></th>
                              <th>Field Datatype <a href="javascript:void(0);"><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Datatype of field"></i></a></th>
                              <th><a href="javascript:void(0);" id="new_field" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> New</a></th>
                            </thead>
                            <tbody>

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
    var field_count = 1;

    $("body").on("click", "#new_field", function() {
      $("#form_builder").append(getTemplate(field_count));
      field_count++;
    });

    $("body").on("click", "#delete_field", function() {
      $(this).closest('tr').remove();
    });


  });

  function getTemplate(id) {
    var template = '<tr>';
    template += '<td><input type="text" name="field_key_' + id + '" placeholder="Field Key" class="form-control" required="true"></td>';
    template += '<td><input type="text" name="field_name_' + id + '" placeholder="Friendly Name" class="form-control" required="true"></td>';
    template += '<td><select  class="form-control" name="field_datatype_' + id + '" required="true"><option value="text">Text Only</option><option value="int">Numbers Only</option></select></td>';
    template += '<td><a href="javascript:void(0);" class="btn btn-sm btn-danger" id="delete_field"><i class="fa fa-trash"></i> Delete</a></td>';
    template += '</tr>';

    return template;
  }
</script>
@endpush
