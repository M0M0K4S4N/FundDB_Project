@extends('layouts.app')

@section('content')
<form method="post" action="/manager-promotion/promotion-add-store">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  placeholder="name" required>
</div>
<div class="form-group">
  <label for="discount_for">Discount_for</label>
  <!-- <input type="number" class="form-control" name="discount_for"  placeholder="food id" required> -->
  <select name="discount_for" class="form-control">
    @foreach($foods as $food)
    <option value="{{$food->id}}">({{$food->id}}){{$food->name}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="discount_value">Discount_value</label>
  <input type="number" class="form-control" name="discount_value"  placeholder="percent" required>
</div>
<div class="form-group">
  <label for="start_date">Start_Date</label>
  <input type="date" class="form-control" name="start_date"  placeholder="start" required>
</div>
<div class="form-group">
  <label for="end_date">End_Date</label>
  <input type="date" class="form-control" name="end_date"  placeholder="end" required>
</div>

<button type="submit" class="btn btn-primary">Add</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
