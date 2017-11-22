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
        <th scope="row">{{ $food->Qty*($food->food->price - $discount)}}</th>
    </tr>
      @endforeach

      <tr>
      <th scope="row" ></th>
      <td>รวม</td>
      <td>{{$result}}</td>
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