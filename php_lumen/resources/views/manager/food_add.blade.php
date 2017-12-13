@extends('layouts.app')

@section('content')
<form method="post" action="/manager-menu/food-add" enctype="multipart/form-data">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  placeholder="Name" required>
</div>
<div class="form-group">
  <label for="type">Type</label>
  <select name="type" class="form-control">
     <option value="Meal">Meal</option>
     <option value="Drink">Drink</option>
     <option value="Desert">Desert</option>
  </select>
</div>
<div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" name="price" placeholder="Price" required>
</div>
 <div class="form-group">
  <label for="picture" >Picture</label>
  <input type="file" name="picture" >
</div>
<button type="submit" class="btn btn-primary">Add</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
