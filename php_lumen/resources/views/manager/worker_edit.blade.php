@extends('layouts.app')

@section('content')
<form method="post" action="/manager-worker/worker-edit-store">
<input type="hidden" class="form-control" name="id" value="{{$worker->id}}">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  value="{{$worker->name}}" required>
</div>
<div class="form-group">
  <label for="job">Job</label>
  <input type="text" class="form-control" name="job"  value="{{$worker->job}}" required>
</div>
<div class="form-group">
  <label for="supervisor">Supervisor</label>
  <input type="text" class="form-control" name="supervisor"  value="{{$worker->supervisor}}">
</div>
<div class="form-group">
  <label for="salary">Salary</label>
  <input type="salary" class="form-control" name="salary"  value="{{$worker->salary}}" required>
</div>

<button type="submit" class="btn btn-primary">Edit</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
