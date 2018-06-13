<!DOCTYPE html>
<html>
<head>
    <title>Google Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/asset/Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Theme Styles CSS -->
    <link rel="stylesheet" type="text/css" href="/asset/css/theme-styles.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/blocks.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/fonts.css">

    <!-- Lightbox popup script-->
    <link rel="stylesheet" type="text/css" href="/asset/css/magnific-popup.css">

    <!-- Styles for plugins -->
    <link rel="stylesheet" type="text/css" href="/asset/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/daterangepicker.css">
    <link rel="stylesheet" href="/asset/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/helper.css">
    <link rel="stylesheet" type="text/css" href="/asset/css/custom.css">
    <style>
        #map {
           height: 100%;
            min-height: 450px;
        }
         /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    
      /* Optional: Makes the sample page fill the window. */
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        border: 1px solid #d8d8d8;
        /*box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-bottom: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
      .label-floating textarea.form-control{
      	border: 1px solid #e6ecf5;
    	border-radius: 0.25rem;
      }
    </style>
</head>
<body>
 <div class="input-group stylish-input-group">
   <input id="pac-input" class="controls ml-sm" type="text" placeholder="<?=lang('目的地、城市、地址')?>">
</div>
<div id="map"></div>
 <script src="/asset/js/googleMapMyLocation.js"></script>
<script>
    function initMap() {
        var uluru = {lat: 23.4302665, lng: 121.5833201};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            streetViewControl: false,
            mapTypeControl:false,
            center: uluru
        });

        //add my location button
        addYourLocationButton(map);

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


         // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });




        var marker = new google.maps.Marker;
        var searchmarkers = [];
         // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old searchmarkers.
          searchmarkers.forEach(function(marker) {
            marker.setMap(null);
          });
          searchmarkers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            searchmarkers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);

        });

 //search box end
        map.addListener('click', function(ApiMouseEvent) {

            marker.setMap(null);

            var lat = ApiMouseEvent.latLng.lat();
            var lng = ApiMouseEvent.latLng.lng();
            var locationJson = ApiMouseEvent.latLng.toJSON()

            var contentString = '<div id="content" style="text-align:center;">'+lat+','+lng+'<br/><button class="btn btn-blue mb0 mt-xs" onclick="select('+lat+','+lng+');"><?=lang('選擇該位置')?></button></div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker = new google.maps.Marker({
                position: locationJson,
                map: map,
                title: lat+','+lng
            });

            infowindow.open(map, marker);
        });


    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?=config_item("googleMapApi")?>&libraries=places&callback=initMap">
</script>
<script src="<?=base_url()?>asset/js/jquery-3.2.0.min.js"></script>
<script>
    function select(lat,lng){
        jQuery("#<?=$id?>", window.opener.document).val(lat+','+lng);
        window.close();
    }
</script>
</body>
</html>