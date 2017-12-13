@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/';">Back to Homepage</button>
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
    <th>order</th>
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
      <td><button type="button" class="btn btn-info" onclick="location.href='/cashier/{{$order->id}}';" @if($order->isPaid == 1)
                  disabled
              @endif>Detail</button>
      </td>
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
@endsection