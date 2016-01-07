@extends('layouts.default')

@section('title', 'Preview Form')

@push('styles')

@endpush



@section('main')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
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
      <div class="panel-body">
        <form method="post" action="" role="form">
          @foreach ($data['fields'] as $field)
            @if ($field->datatype == 'text')
            <div class="form-group">
              <input type="text" name="{{$field->field_key}}" class="form-control" required="true" placeholder="{{$field->field_friendly_name}}">
            </div>
            @elseif ($field->datatype == 'int')
            <div class="form-group">
              <input type="number" name="{{$field->field_key}}" class="form-control" required="true" placeholder="{{$field->field_friendly_name}}">
            </div>
            @elseif ($field->datatype == 'date')
            <div class="form-group">
              <input type="date" name="{{$field->field_key}}" class="form-control" required="true" placeholder="{{$field->field_friendly_name}}">
            </div>
            @endif
          @endforeach
          <input type="submit" class="btn btn-primary" value="submit">
        </form>
      </div>
    </div>
  </div>
</div>
@stop




@push('scripts')

@endpush
