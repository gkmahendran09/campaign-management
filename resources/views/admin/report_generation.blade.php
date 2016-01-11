@extends('layouts.plain')

@section('title', 'Preview Form')

@push('styles')

@endpush



@section('main')
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
          <table class="table table-bordered">
          <thead>
            <tr>
            @foreach ($data['fields'] as $key => $field)
              @if( $key == 0 )
              <th><a href="javascript: void(0);" rel="{{$field->field_key}},{{$field->datatype}},ASC" class="sortable">{{$field->field_friendly_name}}</a> <i class="fa fa-sort"></i></th>
              @else
              <th><a href="javascript: void(0);" rel="{{$field->field_key}},{{$field->datatype}},NULL" class="sortable">{{$field->field_friendly_name}}</a> <i class="fa fa-sort"></i></th>
              @endif
            @endforeach
            </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
            <?php $field_count = count($data['fields']); ?>

            @foreach ($field_data as $data)
                @if ( $i < $field_count )
                <td>{{$data->field_value}}</td>
                <?php $i++; ?>
                @else
                <?php $i = 0; ?>
                <tr><td>{{$data->field_value}}</td>
                <?php $i++; ?>
                @endif


            @endforeach
          </tbody>
        </table>
        </div>
        <div class="col-md-12 text-center">
          {!! $field_data->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@stop




@push('scripts')
@endpush
