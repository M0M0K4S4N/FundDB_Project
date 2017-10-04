@extends('layouts.app')

@section('content')
<form method="post" action="/register">
<div class="form-group">
  <label for="name">Name</label>

  <input type="text" class="form-control" name="name"  placeholder="Name">
</div>
<div class="form-group">
  <label for="address">Address</label>
  <textarea class="form-control" name="address" placeholder="Address" rows="3"></textarea>
</div>
 <div class="form-group">
  <label for="password">Password</label>
  <input type="password" class="form-control" name="password"  placeholder="Password">
</div>
<button type="submit" class="btn btn-primary">Register</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
