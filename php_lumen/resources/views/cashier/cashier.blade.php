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
    <th>ชื่อลูกค้า</th>
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
      <th>{{$order->name}}</th>
      <td><button type="button" class="btn btn-info" onclick="location.href='/cashier/{{$order->order_id}}';" @if($order->isPaid == 1)
                  disabled
              @endif>Detail</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection