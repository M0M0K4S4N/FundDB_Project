@extends('layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="location.href='/';">Back to Homepage</button>

<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th>Order Id</th>
<th>Food</th>
<th>Qty</th>
<th>Cook by</th>
<th>cooking_flag</th>
<th>serve_flag</th>
<th>isPaid</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
@foreach($foods as $food)
<form method="post" action="/crud/order/edit/food/{{$food->id}}">
  <input type="hidden" name="listID" value="{{$food->id}}">
<tr>

<th scope="row">{{$food->id}}</th>
<td>{{$food->order_id}}</td>
<td>{{$food->food_id}} ({{$food->food->name}})

  <div class="form-group">
   <label for="sel1">แก้ไขเป็น </label>
   <select class="form-control" id="sel1" name="food_id">
     @foreach($availableFoods as $avFood)
     <option value="{{$avFood->id}}">{{$avFood->name}}</option>
     @endforeach
   </select>
 </div>
</td>
<td><input type="text"  name="Qty" value="{{$food->Qty}}" size="2"></td>
<td>{{$food->cook_by}}</td>
<td>{{$food->cooking_flag}}</td>
<td>{{$food->serve_flag}}</td>
<td>{{$food->isPaid}}</td>
<td><button type="submit" class="btn btn-primary">แก้ไข</button></td>
</form>
<td>
  <form method="post" action="/crud/order/edit/food/{{$food->id}}/delete">
    <input type="hidden" name="listID" value="{{$food->id}}">
    <button type="submit" class="btn btn-danger">ลบ</button>
  </form>
</td>

</tr>
@endforeach




@endsection
