@section('header')
<meta http-equiv="Refresh" content="5">
@endsection

@extends('layouts.app')

@section('content')


<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>FoodID</th>
<th>Discount Value</th>
<th>Start</th>
<th>End</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>
<tbody>
@foreach($promotions as $promotion)


  <tr>
  <th scope="row">{{ $promotion->id}}</th>

  <td>{{$promotion->name}}</td>

  <td>{{$promotion->discount_for}}</td>

  <td>{{$promotion->discount_value}}</td>

  <td>{{$promotion->start_date}}</td>

  <td>{{$promotion->end_date}}</td>

  
<form method="post" action="/manager-promotion/promotion-edit">
  <input type="hidden" name="id" value="{{ $promotion->id}}">
	<td><button type="submit" class="btn btn-primary" value="edit">Edit</button></td>
</form>

<form method="post" action="/manager-promotion/promotion-delete">
  <input type="hidden" name="id" value="{{ $promotion->id}}">
	<td><button type="submit" class="btn btn-danger" value="delete">Delete</button></td>
</form>
  </tr>

@endforeach

</tr>
</tbody>
<a href="/manager-worker/worker-add"><button type="button" class="btn btn-primary">Add Worker</button></a>

</table>


@endsection
