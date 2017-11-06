@extends('layouts.app')

@section('content')
<form method="post" action="/manager-worker/worker-add">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  placeholder="Name" required>
</div>
<div class="form-group">
  <label for="job">Job</label>
  <input type="text" class="form-control" name="job"  placeholder="Job" required>
</div>
<div class="form-group">
  <label for="supervisor">Supervisor</label>
  <input type="text" class="form-control" name="supervisor"  placeholder="SupervisorID">
</div>
<div class="form-group">
  <label for="salary">Salary</label>
  <input type="salary" class="form-control" name="salary"  placeholder="Salary" required>
</div>

<button type="submit" class="btn btn-primary">Register</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
