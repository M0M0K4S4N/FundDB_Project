<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <title>Restaurant</title>
  <body>
      <center><p class="h1"><strong>WAITER/WAITRESS</strong></p></center>
      <div class="container">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-info">
              <th>Status</th>
              <th>Table</th>
              <th>Food's detail</th>
              <th>Confirm</th>
            </tr>
          </thead>
          <tbody>



             @foreach ($orders as $order)
      @if ($order == NULL)
        <p>NOT FOUND</p>
        @break
      @endif

        <tr>
              <td>รอเสริฟ</td>
              <th scope="row">{{$order->id}}</th>
              <td>{{$order->food->name}}</td>
              <td><a href="/waiter"><button type="button" class="btn btn-success">served</button></a></td>
            </tr>

    @endforeach


    
          </tbody>
        </table>
      </div>
  </body>
</html>