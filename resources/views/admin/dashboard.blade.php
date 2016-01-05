@extends('layouts.admin')

@section('title', 'Dashboard')

@push('styles')

@endpush

@push('scripts')

@endpush


@section('main')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="{{route('dashboard')}}">Home</a>
        </li>
        @for($i = 2; $i <= count(Request::segments()); $i++)
        <li>
          <a href="{{route(Request::segment($i))}}">{{Request::segment($i)}}</a>
        </li>
        @endfor
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">New Campaign</div>
            </div>
            <div class="panel-body">
              <a href="{{route('dashboard')}}" class="btn btn-primary">Start</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="panel-title">Existing Campaign</div>
            </div>
            <div class="panel-body">
              <a href="" class="btn btn-primary">Start</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
