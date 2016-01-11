<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title') - Campaign Manager</title>

      <meta name="_token" content="{!! csrf_token() !!}"/>

        <link href="/site_assets/css/site.css" rel="stylesheet" type="text/css">

        @stack('styles')

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
       <![endif]-->



    </head>
    <body>

      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="navbar navbar-default" role="navigation">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="{{route('dashboard')}}">Campaign Manager</a>
                      </div>
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li class="@yield('dashboard-active')"><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="@yield('report-active')"><a href="{{route('report')}}"><i class="fa fa-book"></i> Report</a></li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                          </ul>
                      </div>
                      <!-- /.navbar-collapse -->
              </nav>
            </div>
          </div>
        </div>
      </div>

        <section class="container-fluid">
          @yield('main')
        </section>

        <footer class="container">
          <div class="row">
            <hr>
            <p class="text-center">Project: Campaign Manger</p>
          </div>
        </footer>

        <!-- Modal -->
        <div id="modal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/site_assets/js/site.min.js"></script>

        @stack('scripts')

    </body>
</html>
