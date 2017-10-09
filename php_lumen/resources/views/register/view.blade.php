@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-primary btn-lg" onclick="location.href='/register';">Register Customer</button>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Address</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
      @if ($customer == NULL)
        <p>NOT FOUND</p>
        @break
      @endif
        <tr>
        <th scope="row">{{ $customer->id }}</th>
        <td>{{ $customer->name }}</td>

        <td>{{ $customer->address }}</td>
        <td>
          <form method="post" action="/register/view/delete">
            <input type="hidden"  name="id" value={{ $customer->id }}>

          <button type="submit" class="btn btn-primary btn-sm" onclick="location.href='/register/delete';">Delete</button></td>
        </form>
      </tr>
    @endforeach


  </tbody>
</table>


@endsection
