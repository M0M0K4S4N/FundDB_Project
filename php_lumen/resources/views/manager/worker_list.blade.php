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
<th>Job</th>
<th>Supervisor</th>
<th>Salary</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>
<tbody>
@foreach($workers as $worker)


  <tr>
  <th scope="row">{{ $worker->id}}</th>

  <td>{{$worker->name}}</td>

  <td>{{$worker->job}}</td>

  <td>{{$worker->supervisor}}</td>

  <td>{{$worker->salary}}</td>
  
<form method="post" action="/manager-worker/worker-edit">
  <input type="hidden" name="id" value="{{ $worker->id}}">
	<td><button type="submit" class="btn btn-primary" value="edit">Edit</button></td>
</form>

<form method="post" action="/manager-worker/worker-delete">
  <input type="hidden" name="id" value="{{ $worker->id}}">
	<td><button type="submit" class="btn btn-danger" value="delete">Delete</button></td>
</form>
  </tr>

@endforeach

</tr>
</tbody>
<a href="/manager-worker/worker-add"><button type="button" class="btn btn-primary">Add Worker</button></a>

</table>


@endsection
