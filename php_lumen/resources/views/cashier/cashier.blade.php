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
      <center><p class="h1"><strong>CASHIERER</strong></p></center>
      <div class="container">
        <table class="table table-bordered">
          <thead>
            <tr class="table-active">
              <th>order</th>
              <th>ข้อมูลรายการอาหาร</th>
              <th>รวมยอดเงิน</th>
              <th>ยืนยันการจ่ายเงิน</th>
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
              <td>
<a href="/cashier/{{$order->id}}">ดูรายการอาหาร
    </a>
              </td>
              <th scope="row"></th>
              <td>
                  <form method="post" action="/register/view/delete">
            <input type="hidden"  name="id" value={{ $order->id }}>

          <button type="button" class="btn btn-success" onclick="location.href='/cashier';">paid</button></td>
        </form>
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