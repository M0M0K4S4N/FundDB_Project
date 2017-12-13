@extends('layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="location.href='/';">Back to Homepage</button>
<button type="button" class="btn btn-primary" onclick="location.href='/customer/menu';">Go to Menu</button>
<button type="button" class="btn btn-primary" onclick="location.href='/customer/queue';">My order queue</button>
<object align="right">You are  <font size="4" color="blue">{{$user->name}}</font> <button type="button" class="btn btn-danger btn-sm" onclick="location.href='/logout';">Logout</button>
</object>
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th>รายการอาหาร</th>
<th>Qty</th>
<th>เวลาออเดอร์</th>
<th>ราคา</th>
</tr>
</thead>
<tbody>
@php
$discount=0;
$result=0;
@endphp

@foreach($foods as $food)
@foreach($promotions as $promotion)
@php
if($promotion->discount_for == $food->food->id)
{
  $discount = $promotion->discount_value;
  break;
}
@endphp
@endforeach
@php
$result += $food->Qty*($food->food->price - $discount);
@endphp
<tr>
<th scope="row">{{$food->order_id}}</th>
<td>{{$food->food->name}}</td>
<td>{{$food->Qty}}</td>
<td>{{$food->inOrder->order_time}}</td>
<td>{{ $food->Qty*($food->food->price - $discount)}}</td>
</tr>
@endforeach

<tr  class="alert alert-success" role="alert">
<th scope="row" ></th>
<td></td>
<td></td>
<td>รวม</td>
<td>{{$result}}</td>

</tr>
</tbody>
</table>
<center>
<div class="alert alert-danger" role="alert">
<p class="h1">กรุณาจ่ายเงินที่โต๊ะเก็บเงิน</p>
</div>
</center>


@endsection
