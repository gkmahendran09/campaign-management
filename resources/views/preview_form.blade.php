@extends('layouts.plain')

@section('title', 'Preview Form')

@push('styles')

@endpush



@section('main')
<div class="row">
  <div class="col-sm-12">
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
        <form method="post" action="{{route('store_form_data')}}" role="form" id="dynamic_form">
          {{csrf_field()}}
          <input type="hidden" name="campaign_id" value="{{$data['campaign_id']}}">
          <input type="hidden" name="form_id" value="{{$data['form_id']}}">
          @foreach ($data['fields'] as $field)
            <div class="form-group">
              @if ($field->datatype == 'text')
                <input type="text" name="field_key[{{$field->field_key}}]" class="form-control" required="true" placeholder="{{$field->field_friendly_name}}">
              @elseif ($field->datatype == 'int')
                <input type="number" name="field_key[{{$field->field_key}}]" class="form-control" required="true" placeholder="{{$field->field_friendly_name}}">
              @elseif ($field->datatype == 'date')
                <input type="text" name="field_key[{{$field->field_key}}]" class="form-control" required="true" placeholder="{{$field->field_friendly_name}} (Format: DD/MM/YYYY) ">
              @endif
              <span class="text-danger" data-error-msg-for="field_key.{{$field->field_key}}"></span>
              <input type="hidden" name="field_datatype[{{$field->field_key}}]" value="{{$field->datatype}}">
              <input type="hidden" name="field_friendly_name[{{$field->field_key}}]" value="{{$field->field_friendly_name}}">
            </div>
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
