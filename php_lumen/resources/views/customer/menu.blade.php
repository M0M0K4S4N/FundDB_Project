@section('header')
<style type="text/css">
    .thumb{
    }
    .img {
    }
    input.chk{
    margin-left: 20px;
    }
 </style>
@endsection

@extends('layouts.app')

@section('content')

<a href="/"><button type="button" class="btn btn-primary">Back to Homepage</button></a>
<a href="/customer/queue"><button type="button" class="btn btn-primary">My order queue</button></a>
<h4>You are logged in as {{$user->name}} <button type="button" class="btn btn-danger sm" onclick="location.href='/logout';">Logout</button></h4>
<form method="post" action="/customer/order">
@for ($i = 1; $i <= count($foods); $i++)
    @if ($i % 3 == 1)

    <div class="card-deck">
    @endif

    <div class="card">

      <label for="img{{$i}}">
      <img class="card-img-top" src="../foodPic/fired_chicken.jpg" alt="Card image cap">



    <div class="card-body">
      <h4 class="card-title">{{$foods[$i-1]->name}}</h4>
    </label>
    </div>
    <div class="card-footer">
      <big class="text-muted">ราคา {{$foods[$i-1]->price}} บาท</big>
      <input type="number" name="qty[]" value="1">
      <input type="checkbox" class="chk" id="img{{$i}}"name="food[]" value="{{$foods[$i-1]->id}}">
    </div>
  </div>

    @if ($i % 3 == 0 || $i == count($foods))

  </div> <br>
    @endif

@endfor
<input type="text"  name="detail" value="">
<button type="submit" class="btn btn-primary">Order</button>
</form>


@endsection
