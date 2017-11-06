@extends('layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="location.href='/';">Back to Homepage</button>
<button type="button" class="btn btn-primary" onclick="location.href='/customer/menu';">สั่งอาหาร</button>
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th>Order By</th>
<th>delivery_flag</th>
<th>detail</th>
<th>Order time</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
<th scope="row">{{$order->id}}</th>
<td>{{$order->customer_id}} ({{$order->byCustomer->name}})</td>
<td>{{$order->delivery_flag}}</td>
<td>{{$order->detail}}</td>
<td>{{$order->order_time}}</td>
<td><button type="button" class="btn btn-primary" onclick="location.href='/crud/order/edit/{{$order->id}}';">แก้ไข</button></td>
<td>
  <form method="post" action="/crud/order/delete">
  <input type="hidden" name="order_id" value="{{$order->id}}">
  <button type="submit" class="btn btn-danger">ลบ</button>
  </form>
</td>
</tr>
@endforeach




@endsection
