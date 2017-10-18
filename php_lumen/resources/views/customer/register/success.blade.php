@extends('layouts.app')

@section('content')
<div class="input-group">
<span class="input-group-btn">
<button class="btn btn-success" type="button">Your Name</button>
</span>
<input type="text" class="form-control" value={{$show->name}} >
</div>
<div class="input-group">
<span class="input-group-btn">
<button class="btn btn-info" type="button">Your Customer ID</button>
</span>
<input type="text" class="form-control" value={{$show->id}} >
</div><br>

<button type="button" class="btn btn-primary btn-lg" onclick="location.href='/';">Back to Homepage</button>
@endsection
