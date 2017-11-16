@extends('layouts.app')
@section('header')

@endsection

@section('content')
<form method="post" action="/register">
<div class="form-group">
  <label for="name">Name</label>

  <input type="text" class="form-control" name="name"  placeholder="Name" required>
</div>
<div class="form-group">
  <label for="address">Address</label>
  <textarea class="form-control" name="address" placeholder="Address" rows="3" required></textarea>
</div>
 <div class="form-group">
  <label for="password" >Password</label>
  <input type="password" class="form-control" name="password"  placeholder="Password" required>
</div>
<button type="submit" class="btn btn-primary">Register</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

<fieldset class=”gllpLatlonPicker”>
<input type=”text” class=”gllpSearchField”>
<input type=”button” class=”gllpSearchButton” value=”search”>
<br/>
<div class=”gllpMap”>Google Maps</div>
lat/lon: <input type=”text” class=”gllpLatitude” value=”20″/> / <input type=”text” class=”gllpLongitude” value=”20″/>, zoom: <input type=”text” class=”gllpZoom” value=”3″/> <input type=”button” class=”gllpUpdateButton” value=”update map”>
</fieldset>

@endsection

@section('script')
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css"/>
  <script src="js/jquery-gmaps-latlon-picker.js"></script>


@endsection
