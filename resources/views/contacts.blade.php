@extends('front_default')

@section('title', '聯絡我們')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_contacts.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('sweetalert-master/dist/sweetalert.css')}}"/>

<script src="{{url('sweetalert-master/dist/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


<script type="text/javascript">
$(function(){
    jQuery.extend(jQuery.validator.messages, {
        required: "此欄位為必填",
        remote: "Please fix this field.",
        email: "請填寫正確信箱格式",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "此欄位只可為數字",
        digits: "此欄位只可為數字",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("此欄位最多  {0} 個字元."),
        minlength: jQuery.validator.format("此欄位最少  {0} 個字元"),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });

    $('button[type=submit]').click(function(){
        
        $("#msgform").validate({
            
            rules: {    name:{ 
                            required: true,
                            maxlength:20,
                        },
                        email:{
                            required: true,
                            email:true
                        },
                        phone:{
                            required: true,
                            maxlength:10,
                            minlength:10,
                            digits:true
                        },
                        msg:{
                            required: true,
                        }
            }
        });

        if( $("#msgform").valid() ){
                $.ajax({
                  method: "POST",
                  dataType: "json",
                  url: "{{url('/contactsdo')}}",
                  data: { 
                          "_token": "{{ csrf_token() }}",
                          "name": $("#name").val(),
                          "email": $("#email").val(),
                          "phone": $("#phone").val(),
                          "msg": $("#msg").val(),
                 }

                })
                .done(function( msg ) {
                    if(msg =='留言成功'){
                         swal({
                    title: '留言完成',
                    text: '您的留言已完成',
                    type: 'success',
                    confirmButtonText: 'OK'
                    })

                    }
                })
                .fail(function( jqXHR,textStatus) {
                    swal({
                    title: '請確認表單!',
                    text: '請確定表單欄位確實填寫',
                    type: 'error',
                    confirmButtonText: '再次確認'
                    })
                });

        }        
    });    
});
</script>
@endsection

@section('main')
<div id='contact_area' class='col-md-12 col-sm-12 col-xs-12'>

  <!--  聯絡我們圖片 -->
  <div id='contactUsTopPic' class='col-md-12 col-sm-12 col-xs-12' >

  </div>
  <!--  聯絡我們圖片結束 -->
  <!--
  <div id='pmap_info' class='col-md-0 col-sm-12 col-xs-12' >
    <div id='pmap_info_txt' class='col-md-0 col-sm-7 col-sm-offset-1 col-xs-7 col-xs-offset-1'>
      <p>緯昶國際貿易有限公司</p>
                            <p>11072 台北市信義區光復南路417巷44號一樓</p>
                            <p> Tel +886-2-8789-1534</p>
                            <p> Tel +886-2-8789-1441</p>
                            <p>wine@wealeternity.com</p>
                            
    </div>
  </div>

  <div id='pformtitle' class='col-md-0 col-sm-12 col-xs-12' >
      <div id='pformpic' class='col-md-0 col-sm-12 col-sm-offset-1 col-xs-12 col-xs-offset-1'>
        
      </div>
  </div>-->
<!--  -->
  <div id='contact_map_area' class='col-md-6 col-md-offset-1 col-sm-12 col-xs-12'>

    <div id='contactMapText' class='col-md-12 col-sm-12 col-xs-12'>
        <p>緯昶國際貿易有限公司</p>
        <p>11072 台北市信義區光復南路417巷44號一樓</p>
        <p> Tel +886-2-8789-1534</p>
        <p> Tel +886-2-8789-1441</p>
        <p>wine@wealeternity.com</p>      
    </div>

    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat:25.036796, lng: 121.558259};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru,
          styles:[
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#d3d3d3"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "color": "#808080"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#b3b3b3"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "weight": 1.8
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#d7d7d7"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ebebeb"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a7a7a7"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#efefef"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#696969"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#737373"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#d6d6d6"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {},
    {
        "featureType": "poi",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#dadada"
            }
        ]
    }
]
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon: 'image/contacts/location_icon.png',
          //content: contentString
        });
        /*
        var contentString = '<div id="cusinfo" style="background-color:#752761;padding:10px;"><h6>緯昶國際貿易有限公司</h6>'+
                            '<h6>11072 台北市信義區光復南路417巷44號一樓</h6>'+
                            '<h6>Tel +886-2-8789-1534</h6>'+
                            '<h6>Fax +886-2-8789-1441</h6>'+
                            '<h6>wine@wealeternity.com</h6>'+
                            '</div>';
        */

  if($(window).width()>992){
  /*var infowindow = new google.maps.InfoWindow({
    content: contentString,
    pixelOffset: new google.maps.Size(200,0)
  });*/
  
google.maps.event.addListener(marker, 'click', function() {
   infowindow.open(map,marker);
});
google.maps.event.addListenerOnce(map, 'idle', function(){
    jQuery('.gm-style-iw').prev('div').remove();
}); 
infowindow.open(map,marker);}

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5En3YPaAdPpk-zALVIZk5uqF_ob2pvCM&callback=initMap">
    </script>
  </div>
<!--  -->
	<div id='contact_form_area' class='col-md-5 col-sm-12 col-xs-12'>
		<div id='contact_form' class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
    <form method="post" onsubmit="return false" id='msgform'>
      <div id='fildall'>
        
        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="text" class="form-control" id='name' name='name' placeholder="姓名">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id='email' name='email' placeholder="信箱">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="text" class="form-control" id='phone' name='phone' placeholder="電話">
        </div>  
        
        <textarea class="form-control" rows="8" placeholder="訊息" id='msg' name='msg' style='resize: none;'></textarea>

      </div>
      <button type="submit" class="btn btn-default" id='msgbtn'>Submit</button>
    </form>			
		</div>
	</div>


</div>

@endsection