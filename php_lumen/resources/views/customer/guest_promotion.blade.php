@extends('layouts.app')

@section('content')

<a href="/"><button type="button" class="btn btn-primary">Back to Homepage</button></a>

@for ($i = 1; $i <= count($promotions); $i++)
    @if ($i % 3 == 1)
    <div class="card-deck">
    @endif
    <div class="card">
      <img class="card-img-top" src="foodPic/fired_chicken.jpg" alt="Card image cap">

      <div class="card-body">
        <h4 class="card-title">{{$promotions[$i-1]->forFood->name}} ลด {{ $promotions[$i-1]->discount_value}} บาท</h4>
        <p class="card-text">{{ $promotions[$i-1]->name}}่</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">หมดเขต {{$promotions[$i-1]->end_date}}</small>
      </div>
    </div>
    @if ($i % 3 == 0)
  </div> <br>
    @endif
@endfor


@endsection
