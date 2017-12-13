
@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='/delivery';">Back</button>
<div>
<section id="map" class="testimonials">
  <div id="map-canvas" style="height: 500px;"></div>
</section><!--about us-->
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWHqgPdKV5J3TRtnvVlAsQtcKLJIGQ17U&callback=initMap"
  type="text/javascript"></script>
        <script type="text/javascript">
            var myLatlng;
            var map;
            var marker;

            function initialize() {
@foreach ($orders as $order)
                myLatlng = new google.maps.LatLng({{$order->lat}},{{$order->long}});
@endforeach
                var mapOptions = {
                    zoom: 17,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: true,
                    draggable: true
                };
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var contentString = '{{$order->address}}';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Marker'
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

@endsection
