@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/';">Back to Homepage</button>
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
      <th>Status</th>
      <th>Order</th>
      <th>Adress</th>
      <th>ยืนยันการจัดส่ง</th>
      <th>Detail $ Paid</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($orders as $order)
      @if ($order == NULL)
        <p>NOT FOUND</p>
      @break
      @endif
      <tr>
              <td>
                    @if ($order->serve_flag == 1)
                        @if($order->isServe == 1)
                                  @if($order->isPaid == 1)
                                      จ่ายเงินแล้ว
                                   @else
                                      กำลังจัดส่ง
                                  @endif
                         @else
                            กำลังจัดส่ง
                        @endif
                    @elseif($order->cooking_flag == 1)
                        กำลังทำอาหาร
                    @else
                        รอคิว
                    @endif
              </td>
              <td>{{$order->order_id}}</td>
              <td><a href="/delivery/mapOf{{$order->customer_id}}">{{$order->address}}</a></td>

        <form method="post" action="/delivery/served{{$order->order_id}}">
            <input type="hidden" name="order_id" value="{{ $order->order_id}}">
            <input type="hidden" name="food_id" value="{{ $order->food_id}}">
              @if ($order->isServe == 0)
                  <td><button type="submit" class="btn btn-success" 
                  @if($order->serve_flag != 1)
                      disabled
                  @endif
                >confirm</button></td>
              @else
          <td><button type="button" class="btn btn-danger" disabled>confirm</button></td>
          @endif
        </form>
          <form method="post" action="/delivery/detail{{$order->order_id}}">
        <input type="hidden" name="order_id" value="{{ $order->order_id}}">
        <input type="hidden" name="food_id" value="{{ $order->food_id}}">
      <td><button type="submit" class="btn btn-primary" 
              @if($order->isPaid == 1)
                  disabled
              @endif
              >Detail</button></td>
    </form>
  </tr>
@endforeach
  </tbody>
</table>
@endsection