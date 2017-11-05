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
<th>Qty</th>
<th>Time</th>
<th>Confirm</th>
<th>In Progress</th>
<th>Ready to serve</th>

<th>Cancel</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<form method="post" action="/chef_update_orderslist">
  <input type="hidden" name="order_id" value="{{ $order->order_id}}">
  <input type="hidden" name="food_id" value="{{ $order->food_id}}">
  <input type="hidden" name="qty" value="{{ $order->Qty}}">
  <tr>
  <th scope="row">{{ $order->order_id}}</th>

  <td>{{$order->name}}</td>

  <td>{{$order->Qty}}</td>

  <td>{{$order->order_time}}</td>
  <td><input type="checkbox" name="confirm" value="confirm"></td>
  <td><input type="checkbox" name="inprogress" value="inprogress" ></td>
  <td><input type="checkbox" name="readytoserve" value="readytoserve"></td>
  <td>
    <button type="submit" class="btn btn-danger" value="cancel">Cancel</button></td>
  </tr>

@endforeach

</tr>
</tbody>
</table>
<button type="submit" class="btn btn-primary" value="update">Update</button>
</form>

@endsection
