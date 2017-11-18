@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<table class="table table-bordered">
  <thead>
      <tr class="bg-info">
        <th>Status</th>
        <th>Table</th>
        <th>Food's detail</th>
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
          <td>{{$order->order_id}}</td>
          <td>{{$order->name}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
 @endsection