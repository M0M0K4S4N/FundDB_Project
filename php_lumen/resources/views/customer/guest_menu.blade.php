@extends('layouts.app')

@section('content')

<a href="/"><button type="button" class="btn btn-primary">Back to Homepage</button></a>

@for ($i = 1; $i <= count($foods); $i++)
    @if ($i % 3 == 1)
    <div class="card-deck">
    @endif
    <div class="card">
    <img class="card-img-top" src="foodPic/fired_chicken.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">{{$foods[$i-1]->name}}</h4>
    </div>
    <div class="card-footer">
      <big class="text-muted">ราคา {{$foods[$i-1]->price}} บาท</big>
    </div>
  </div>
    @if ($i % 3 == 0)
  </div> <br>
    @endif
@endfor


@endsection
