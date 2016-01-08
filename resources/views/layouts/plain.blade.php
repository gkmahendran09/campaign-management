<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>@yield('title') - Campaign Manager</title>

        <link href="/site_assets/css/site.css" rel="stylesheet" type="text/css">

        @stack('styles')

        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
       <![endif]-->



    </head>
    <body>

        <section class="container-fluid">
          @yield('main')
        </section>


        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/site_assets/js/site.min.js"></script> -->

        @stack('scripts')

    </body>
</html>
