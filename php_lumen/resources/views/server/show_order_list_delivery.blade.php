@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/delivery';">Back</button>
<table class="table table-bordered">
  <thead>
    <tr class="table-active">
      <th>Order</th>
      <th>Status</th>
      <th>รายการอาหารที่สั่ง</th>
      <th>จำนวน</th>
      <th>ราคาต่อหน่วย</th>
      <th>ราคา</th>
      <th>ยืนยันการจัดส่ง</th>    
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
        <td>
                    @if ($food->serve_flag == 1)
                        @if($food->isServe == 1)
                            @if($food->isPaid == 1)
                                      จ่ายเงินแล้ว
                                   @else
                                      กำลังจัดส่ง
                                  @endif
                         @else
                            รอจัดส่ง
                        @endif
                    @elseif($food->cooking_flag == 1)
                        กำลังทำอาหาร
                    @else
                        รอคิวทำอาหาร
                    @endif 
          </td>
        <td>{{$food->food->name}}</td>
        <td>{{$food->Qty}}</td>
        <td>{{$food->food->price - $discount}}</td>
        <td>{{ $food->Qty*($food->food->price - $discount)}}</td>
          <form method="post" action="/delivery/served">
            <input type="hidden" name="order_id" value="{{$food->order_id}}">
            <input type="hidden" name="food_id" value="{{$food->food_id}}">
              @if ($food->isServe == 0)
                  <td><button type="submit" class="btn btn-success" 
                  @if($food->serve_flag == 0)
                      disabled
                  @endif
                >confirm</button></td>
              @else
          <td><button type="button" class="btn btn-danger" disabled>confirmed</button></td>
          @endif
        </form>
    </tr>
@endforeach
      <tr>   
      <td colspan="6">รวม</td>
      <th scope="row">{{$result}}</th>
      </tr>

      <tr>   
      <td colspan="6">รับเงินมา</td>
      <td><input type='text' id='input1' onkeyup='nStr()'> <br/></td>
      </tr>

      <tr>   
      <td colspan="6">เงินทอน</td>
      <td><font id="show" color=""></font> </td>
      </tr>

      <tr>
      <td colspan="6">ยืนยันการจ่ายเงิน</td>
      @foreach($foods as $food)
      <form method="post" action="/delivery/paid{{$food->order_id}}">
        <input type="hidden" name="order_id" value="{{ $food->order_id}}">
        <input type="hidden" name="food_id" value="{{ $food->food_id}}">
        @endforeach
      <td><button type="submit" class="btn btn-primary"
                  @if($food->isPaid == 1)
                      disabled
                  @endif
        >Paid</button></td>
     </form>
      </tr>
  </tbody>
</table>

<script language="javascript" type='text/javascript'>
function nStr(){
    var int1 =document.getElementById('input1').value;  
    var n1 = parseInt(int1);       
    var show=document.getElementById('show');
    
                 document.getElementById("show").setAttribute("color","Blue");    
                 show.innerHTML=n1-{{$result}}; 

          if (isNaN(n1)){    
          document.getElementById("show").setAttribute("color","red");       
          show.innerHTML="Refill"
                 }          
       }          
</script>
@endsection