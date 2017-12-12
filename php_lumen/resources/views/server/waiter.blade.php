@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/';">Back to Homepage</button>
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
          <td>
                    @if ($order->serve_flag == 1)
                        @if($order->isServe == 1)
                            @if($order->isPaid == 1)
                                      จ่ายเงินแล้ว
                                   @else
                                      เสิร์ฟแล้ว
                                  @endif
                         @else
                            รอเสิร์ฟ
                        @endif
                    @elseif($order->cooking_flag == 1)
                        กำลังทำอาหาร
                    @else
                        รอคิว
                    @endif 
          </td>
          <td>{{$order->order_id}}</td>
          <td>{{$order->name}}</td>
          <form method="post" action="/waiter/served">
            <input type="hidden" name="order_id" value="{{ $order->order_id}}">
            <input type="hidden" name="food_id" value="{{ $order->food_id}}">

          @if ($order->isServe == 0)
              <td><button type="submit" class="btn btn-success" 
              @if($order->serve_flag != 1)
                  disabled
              @endif
            >serve</button></td>
          @else
          <td><button type="button" class="btn btn-danger" disabled>served</button></td>
          @endif
          </form>
      </tr>
      @endforeach
  </tbody>
</table>
 @endsection