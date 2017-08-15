@extends('front_default')

@section('title', '聯絡我們')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_contacts.css')}}"/>
@endsection

@section('main')
<div id='contact_area' class='col-md-12 col-sm-12 col-xs-12'>
  <div id='pmap_info' class='col-md-0 col-sm-12 col-xs-12' >
    <div id='pmap_info_txt' class='col-md-0 col-sm-7 col-sm-offset-1 col-xs-7 col-xs-offset-1'>
      <p>緯昶國際貿易有限公司</p>
                            <p>11072 台北市信義區光復南路417巷44號一樓</p>
                            <p> Tel +886-2-8789-1534</p>
                            <p> Tel +886-2-8789-1441</p>
                            <p>service@wealeternity.com</p>
                            
    </div>
  </div>

  <div id='pformtitle' class='col-md-0 col-sm-12 col-xs-12' >
      <div id='pformpic' class='col-md-0 col-sm-12 col-sm-offset-1 col-xs-12 col-xs-offset-1'>
        
      </div>
  </div>

	<div id='contact_form_area' class='col-md-5 col-sm-12 col-xs-12'>
		<div id='contact_form' class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
    <form>
      <div id='fildall'>
        
        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="NAME">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="EMAIL">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="PHONE">
        </div>  
        
        <textarea class="form-control" rows="8" placeholder="MESSAGE"></textarea>

      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>			
		</div>
	</div>

	<div id='contact_map_area' class='col-md-7 col-sm-12 col-xs-12'>
		<div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat:25.036796, lng: 121.558259};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru,
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon: 'image/contacts/location_icon.png',
          content: contentString
        });
        var contentString = '<div id="cusinfo"><h6>緯昶國際貿易有限公司</h6>'+
                            '<h6>11072 台北市信義區光復南路417巷44號一樓</h6>'+
                            '<h6>Tel +886-2-8789-1534</h6>'+
                            '<h6>Tel +886-2-8789-1441</h6>'+
                            '<h6>service@wealeternity.com</h6>'+
                            '</div>';

  if($(window).width()>992){
  var infowindow = new google.maps.InfoWindow({
    content: contentString,
    pixelOffset: new google.maps.Size(200,0)
  });
  
google.maps.event.addListener(marker, 'click', function() {
   infowindow.open(map,marker);
});
infowindow.open(map,marker);}

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5En3YPaAdPpk-zALVIZk5uqF_ob2pvCM&callback=initMap">
    </script>
	</div>
</div>
    <style>

       #map > div > div > div:nth-child(1) > div:nth-child(4) > div:nth-child(4) > div > div:nth-child(1) > div:nth-child(1){
           display: none;
       }
       #map > div > div > div:nth-child(1) > div:nth-child(4) > div:nth-child(4) > div > div:nth-child(1) > div:nth-child(3) > div:nth-child(2){
           display: none;
       }
       #map > div > div > div:nth-child(1) > div:nth-child(4) > div:nth-child(4) > div > div:nth-child(1) > div:nth-child(3) > div:nth-child(2) > div{
           display: none;
       }
       #map > div > div > div:nth-child(1) > div:nth-child(4) > div:nth-child(4) > div > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) > div{
           display: none;
       }
       #map > div > div > div:nth-child(1) > div:nth-child(4) > div:nth-child(4) > div > div:nth-child(1) > div:nth-child(4){
         background-color: rgba(119, 40, 99, 0.61)!important;
       }
       .gm-style-iw{
         background-color: rgba(119, 40, 99, 0);
       }
       #cusinfo>h6{
         color:white;
       }
    </style>
@endsection