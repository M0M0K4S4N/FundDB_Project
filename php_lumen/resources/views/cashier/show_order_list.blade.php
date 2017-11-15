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
      <center><p class="h1"><strong>SHOW ORDER LIST</strong></p></center>
      <div class="container">
        <table class="table table-bordered">
          <thead>
            <tr class="table-active">
              <th>Order</th>
              <th>รายการอาหารที่สั่ง</th>
              <th>ราคา</th>
          
            </tr>
          </thead>
          <tbody>

      @foreach ($orders as $order)
      @if ($order == NULL)
        <p>NOT FOUND</p>
        @break
      @endif
      
        <tr>
              <td>{{$order->order_id}}</td>
              <td>{{$order->name}}</td>
              <th scope="row">{{$order->price}}</th>
        </tr>
      @endforeach
            <!-- <tr>
              <td>1</td>
              <td>สเต๊กเนื้อ ซอสพริกไทยดำ ไข่ดาว</td>
              <th scope="row">500</th>
              <td><button type="button" class="btn btn-success">paid</button></td>
            </tr>


            <tr>
              <td>5</td>
              <td>สเต๊กเนื้อ ซอสพริกไทยดำ ไข่ดาว ไม่สุก</td>
              <th scope="row">490</th>
              <td><button type="button" class="btn btn-success">paid</button></td>
            </tr> -->
          </tbody>
        </table>
      </div>
  </body>
</html>