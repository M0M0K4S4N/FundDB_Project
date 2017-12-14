@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')


<table class="table table-striped">
<thead>
<tr>
<th>Order#</th>
<th>List</th>
<th>Detail</th>
<th>Qty</th>
<th>Time</th>
<th>In Progress</th>
<th>Ready to serve</th>

</tr>
</thead>
<tbody>
@foreach($orders as $order)


  <tr>
  <th scope="row">{{ $order->order_id}}</th>

  <td>{{$order->name}}</td>
  <td>{{$order->detail}}</td>
  <td>{{$order->Qty}}</td>

  <td>{{$order->order_time}}</td>

<form method="post" action="/chef-queue/cooking">
  <input type="hidden" name="order_id" value="{{ $order->order_id}}">
  <input type="hidden" name="food_id" value="{{ $order->food_id}}">
  @if ($order->cooking_flag == 0)
	<td><button type="submit" class="btn btn-info" value="cooking"></td>
  @else
	<td><button type="button" class="btn btn-success" ></td>
  @endif
</form>


<form method="post" action="/chef-queue/ready">
  <input type="hidden" name="order_id" value="{{ $order->order_id}}">
  <input type="hidden" name="food_id" value="{{ $order->food_id}}">
  @if ($order->serve_flag == 0)
	<td><button type="submit" class="btn btn-info" value="ready"></td>
  @else
	<td><button type="button" class="btn btn-success" ></td>
  @endif
</form>

<form method="post" action="/chef-queue/cancel">
  <input type="hidden" name="order_id" value="{{ $order->order_id}}">
  <input type="hidden" name="food_id" value="{{ $order->food_id}}">
	<td><button type="submit" class="btn btn-danger" value="cancel">Cancel</button></td>
  </tr>
</form>

@endforeach

</tr>
</tbody>
</table>


@endsection
