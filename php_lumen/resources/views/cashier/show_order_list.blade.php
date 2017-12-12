@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
      <th>Order</th>
      <th>รายการอาหารที่สั่ง</th>
      <th>จำนวน</th>
      <th>ราคาต่อหน่วย</th>
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
        <td>{{$food->order_id}}</td>
        <td>{{$food->food->name}}</td>
        <td>{{$food->Qty}}</td>
        <td>{{$food->food->price - $discount}}</td>
        <td>{{ $food->Qty*($food->food->price - $discount)}}</td>
    </tr>
@endforeach
      <tr>   
      <td colspan="4">รวม</td>
      <th scope="row">{{$result}}</th>
      </tr>
 
      <tr>
      <td colspan="4">ยืนยันการจ่ายเงิน</td>
      @foreach($foods as $food)
      <form method="post" action="/cashier/paid{{$food->order_id}}">
        <input type="hidden" name="order_id" value="{{ $food->order_id}}">
        <input type="hidden" name="food_id" value="{{ $food->food_id}}">
        @endforeach
      <td><button type="submit" class="btn btn-primary">Paid</button></td>
    </form>
    
      </tr>
  </tbody>
</table>

@endsection