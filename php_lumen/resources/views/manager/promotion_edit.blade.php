@extends('layouts.app')

@section('content')
<form method="post" action="/manager-promotion/promotion-edit-store">
<input type="hidden" class="form-control" name="id" value="{{$promotion->id}}">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  value="{{$promotion->name}}" required>
</div>
<div class="form-group">
  <label for="discount_for">Discount_for</label>
  <input type="number" class="form-control" name="discount_for"  value="{{$promotion->discount_for}}" required>
</div>
<div class="form-group">
  <label for="discount_value">Discount_value</label>
  <input type="number" class="form-control" name="discount_value"  value="{{$promotion->discount_value}}" required>
</div>
<div class="form-group">
  <label for="start_date">Start_Date</label>
  <input type="date" class="form-control" name="start_date"  value="{{$promotion->start_date}}" required>
</div>
<div class="form-group">
  <label for="end_date">End_Date</label>
  <input type="date" class="form-control" name="end_date"  value="{{$promotion->end_date}}" required>
</div>

<button type="submit" class="btn btn-primary">Edit</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
