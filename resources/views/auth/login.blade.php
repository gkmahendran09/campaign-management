@extends('layouts.default')

@section('title', 'Login')

@push('styles')

@endpush

@push('scripts')

@endpush


@section('main')

<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="row">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">
            Admin
          </div>
          <div class="panel-body">
            <form method="post" action="/auth/login" class="form-horizontal" role="form">
                 {{ csrf_field() }}

                 <div class="form-group">
                     <label for="email" class="col-sm-3 control-label">E-mail</label>

                     <div class="col-sm-9">
                         <input type="email" name="email" class="form-control" tabindex="1" required="true" value="{{ old('email') }}">
                     </div>
                 </div>

                 <div class="form-group">
                     <label for="password" class="col-sm-3 control-label">Password</label>

                     <div class="col-sm-9">
                         <input type="password" name="password" class="form-control" tabindex="2" required="true">
                     </div>
                 </div>

                 <div class="form-group">

                     <div class="col-sm-9 col-sm-offset-3">
                         <input type="submit" name="submit" class="btn btn-success" tabindex="3" value="Submit">
                     </div>
                 </div>

                 <div class="form-group">

                     <div class="col-sm-9 col-sm-offset-3">
                       <label><input type="checkbox" name="remember"> Remember Me</label>
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

@stop
