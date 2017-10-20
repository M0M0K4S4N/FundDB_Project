<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>{{ $title }} - Resturant</title>
    @yield('header')
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="alert alert-secondary" role="alert">
        <h1>{{ $title }}<br>
          </div>
        @component('layouts.nav')
        @endcomponent
      </div>
      <div class="col-md-2"></div>

      </div>
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        @yield('content')

      </div>
      <div class="col-md-2"></div>

      </div>
    </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      </body>
    </html>
