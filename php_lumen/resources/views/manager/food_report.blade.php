@extends('layouts.app')

@section('content')


<table class="table table-striped">

<thead>
<tr>
<td>Date</td>
<td>Foodname</td>
<td>Sum</td>
</tr>
</thead>

<tbody>
@foreach ( $charts as $chart)
<tr>
<td>{{$chart->date}}</td>
<td>{{$chart->name}}</td>
<td>{{$chart->sum}}</td>

</tr>
@endforeach
</tbody>
</table>



@endsection
