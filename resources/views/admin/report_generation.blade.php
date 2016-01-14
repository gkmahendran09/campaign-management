<div class="row text-center">
  <div class="col-md-2 col-md-offset-5">
    Processed in <span class="text-danger">{{ \Carbon\Carbon::now()->diffInSeconds(\Carbon\Carbon::createFromTimestamp(LARAVEL_START))}}</span> seconds
  </div>
</div>
<div class="row">
  <div class="">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          <div class="row">
            <div class="col-sm-6 text-left">
              Campaign Name: {{$data['campaign_name']}}
            </div>
            <div class="col-sm-6 text-right">
              Form Name: {{$data['form_name']}}
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body table-responsive">
        <div id="report_table">
          @if (count($field_data) > 0)
          <div class="row text-right">
            <div class="col-md-12">
              <a href="javascript:void(0);" class="btn btn-success" id="filterClear" style="display:none;"><i class="fa fa-filter"></i> Clear Filter</a>
              <a href="javascript:void(0);" class="btn btn-primary" id="filterToggle"><i class="fa fa-filter"></i> Toggle Filter</a>
            </div>
            <br><br>
          </div>
          <table class="table table-bordered">
          <thead>
            <tr id="search-container" style="display:none;">
            @foreach ($data['fields'] as $key => $field)
              <th><div class="form-group"><div class="input-group"><div class="input-group-addon"><i class="fa fa-search"></i></div><input type="text" placeholder="Search {{$field->field_friendly_name}}" class="form-control searchable" rel='{"campaign_id": "{{$data['campaign_id']}}","form_id": "{{$data['form_id']}}","field_key": "{{$field->field_key}}" }'></div></div></th>
            @endforeach
            </tr>
            <tr>
            @foreach ($data['fields'] as $key => $field)
              <th><a href="javascript: void(0);" rel="{{$field->field_key}},{{$field->datatype}},NULL" class="sortable">{{$field->field_friendly_name}}</a> <i class="fa fa-sort"></i></th>
            @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($field_data->chunk($data['field_count']) as $data)
              <tr>
                @foreach ( $data as $d )
                <td>{{$d->field_value}}</td>
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <p class="lead text-center text-danger">NO Results</p>
        @endif
        </div>
        <div class="col-md-12 text-center">
          {!! $field_data->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>
