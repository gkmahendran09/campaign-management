@extends('layouts.default')

@section('title', 'Home')

@push('styles')

@endpush



@section('main')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Select Form
        </div>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <select name="campaign_list" id="campaign_list" class="form-control">
            <option value="">Select Campaign</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
@stop




@push('scripts')

@endpush
