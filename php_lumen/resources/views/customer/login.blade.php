@extends('layouts.app')

@section('content')

<form method="post" action="/login">
    
<div class="form-group">
  <label for="accnumInput">Account Number</label>
  <input type="text" class="form-control" name="accountNum"  placeholder="Enter Account Number">
</div>
<div class="form-group">
  <label for="passwdInput">Password</label>
  <input type="password" class="form-control" name="passwd" placeholder="Password">
</div>
<button type="submit" class="btn btn-primary">Login</button>
</form>

@endsection
