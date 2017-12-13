@section('header')
<style type="text/css">
    input.chk{
      margin-left: 20px;
    }

 </style>

@endsection

@extends('layouts.app')

@section('content')

<a href="/"><button type="button" class="btn btn-primary">Back to Homepage</button></a>
<a href="/customer/queue"><button type="button" class="btn btn-primary">My order queue</button></a>
<object align="right">You are  <a href='/customer/profile'><font size="4" color="blue">{{$user->name}}</font></a> <button type="button" class="btn btn-danger btn-sm" onclick="location.href='/logout';">Logout</button>
</object>
<form method="post" action="/customer/order">
  <label for="delivery_button">
  <div class="alert alert-info" role="alert">
    ต้องการ Delivery :
    <input type="checkbox" class="pull-right" style="float:right;"id="delivery_button"name="delivery" value="1">
  </div>

@for ($i = 1; $i <= count($foods); $i++)
    @if ($i % 3 == 1)

    <div class="card-deck">
    @endif
    <div class="card">
      <label for="img{{$i}}">
      <img class="card-img-top" src="..{{$foods[$i-1]->picture}}" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">{{$foods[$i-1]->name}}</h4>
    </div>
    <div class="card-footer">
      </label>
      <big class="text-muted">ราคา {{$foods[$i-1]->price}} บาท</big>
      <input type="number" name="qty[]" value="1">
      <input type="checkbox" class="chk" id="img{{$i}}"name="food[]" value="{{$foods[$i-1]->id}}">
    </div>
  </div>

    @if ($i % 3 == 0 || $i == count($foods))

  </div> <br>
    @endif

@endfor
<div class="card">
  <div class="card-header">
    หมายเหตุ
  </div>
  <div class="card-body">
    <textarea class="form-control" name="detail" value=""></textarea>
  </div>
</div>
</label>
<div align="right">
<button type="submit" class="btn btn-primary btn-lg" align="right">Order</button>
</div>
</form>



@endsection
