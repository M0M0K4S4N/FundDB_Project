@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/';">Back to Homepage</button>
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
      <th>Order</th>
      <th>Adress</th>
      <th>Detail & Paid</th>
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
              <td><a href="/delivery/mapOf{{$order->customer_id}}">{{$order->address}}</a></td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='/delivery/detail{{$order->order_id}}';"
              @if($order->isPaid == 1)
                  disabled
              @endif
              >Detail</button></td>
  </tr>
@endforeach
  </tbody>
</table>
@endsection