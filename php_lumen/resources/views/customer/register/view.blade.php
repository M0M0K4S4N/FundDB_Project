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
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
      @if ($customer == NULL)
        <p>NOT FOUND</p>
        @break
      @endif
        <form method="post" action="/crud/register/edit">
          <input type="hidden"  name="id" value={{ $customer->id }}>
          <tr>
          <th scope="row">{{ $customer->id }}</th>
          <td><input type="text" name="name" value="{{ $customer->name }}"></td>

          <td><input type="text" name="address" value="{{ $customer->address }}"></td>
          <td>
            <button type="submit" class="btn btn-primary btn-sm">แก้ไข</button>
          </td>
        </form>
        <td>
          <form method="post" action="/register/view/delete">
            <input type="hidden"  name="id" value={{ $customer->id }}>

          <button type="submit" class="btn btn-primary btn-sm" >Delete</button></td>
        </form>
      </tr>
    @endforeach


  </tbody>
</table>


@endsection
