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
  <fieldset class="gllpLatlonPicker ">
  <textarea class="gllpSearchField form-control" name="address" placeholder="Address" rows="3" required></textarea>

  <!-- <input type="text" class="gllpSearchField form-control"> -->
  <input type="button" class="gllpSearchButton btn btn-info btn-sm" value="Map Search">
  <br/>
  <div class="gllpMap">Google Maps</div>
  <input type="hidden" class="gllpLatitude" name="lat" value="20"/>
  <input type="hidden" class="gllpLongitude" name="long" value="20"/>
   <input type="hidden" class="gllpZoom" value="3"/>
   <!-- <input type="button" class="gllpUpdateButton btn btn-info btn-sm" value="update map"> -->
  </fieldset>
</div>
 <div class="form-group">
  <label for="password" >Password</label>
  <input type="password" class="form-control" name="password"  placeholder="Password" required>
</div>
<button type="submit" class="btn btn-primary">Register</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>



@endsection

@section('script')
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-gmaps-latlon-picker.css"/>
  <script src="js/jquery-gmaps-latlon-picker.js"></script>


@endsection
