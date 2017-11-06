@extends('layouts.app')

@section('content')
<form method="post" action="/manager-menu/food-add">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  placeholder="Name" required>
</div>
<div class="form-group">
  <label for="type">Type</label>
  <input type="text" class="form-control" name="type"  placeholder="type" required>
</div>
<div class="form-group">
  <label for="price">Price</label>
  <input type="text" class="form-control" name="price" placeholder="Price" required>
</div>
 <div class="form-group">
  <label for="picture" >Picture</label>
  <input type="file" name="picture" id="picture">
</div>
<button type="submit" class="btn btn-primary">Add</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
