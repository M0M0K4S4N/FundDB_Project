@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
      <th>Status</th>
      <th>Adress</th>
      <th>Food's detail</th>
      <th>cost</th>
      <th>ยืนยันการจัดส่ง</th>
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
              <td>
                    @if ($order->serve_flag == 1)
                        @if($order->delivery_flag == 0)
                            เสิร์ฟ
                         @else
                            จัดส่งแล้ว
                        @endif
                    @elseif($order->cooking_flag == 1)
                        กำลังทำอาหาร
                    @else
                        รอคิว
                    @endif
              </td>
              <td>{{$order->address}}</td>
              <td>{{$order->name}}</td>
              <td>{{$order->price}}</td>
              <td><a href="/delivery"><button type="button" class="btn btn-danger">confirm</button></a></td>
              <td><a href="/delivery"><button type="button" class="btn btn-success">confirm</button></a></td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection