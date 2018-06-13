<!DOCTYPE html>
<html lang="en">
<head>

    <title><?=lang('航拍任務')?> | skyerX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="x-ua-compatible" content="ie=edge"> -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="keywords" content="<?=config_item("keywords")?>">
    <meta name="description" content="<?=config_item("description")?>">
    <link href="/asset/img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- Main Font -->
    <script src="/asset/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
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
    <script  type="text/javascript" src="/asset/js/jquery-3.2.0.min.js"></script>



    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
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
<?php include_once "./application/views/header.php"; ?>
<div class="header-spacer header-spacer-small"></div>
<div class="row row-mission">
    <div class="col-sm-12 hidden-xs">
         <div class="row">
             <div class="mission-btns bg-white">
                <div class="container">
                    <div class="col-xl-8 offset-xl-2 col-lg-12">
                        <ul class="mb0 row">
                            <a class="col-sm-3 " href="<?=site_url('home/mission')?>"><li><?=lang('距離')?></li></a>
                            <a class="col-sm-3" href="<?=site_url('home/mission_price')?>"><li><?=lang('價格')?></li></a>
                            <a class="col-sm-3 active" href="<?=site_url('home/mission_map')?>"><li><?=lang('地圖')?></li></a>
                            <?php if(is_login()){ ?>
                                <a class="col-sm-3 " href="<?=site_url('home/mission_list')?>"><li><?=lang('任務清單')?></li></a>
                            <?php }else{ ?>
                                <a class="col-sm-3 " href="###" onclick="prop_login();"><li><?=lang('任務清單')?></li></a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-sm-12 visible-xs">
        <div class="row">
            <ul class="mission-btns bg-white">
                <a class="col-xs-4" href="<?=site_url('home/mission')?>"><li><?=lang('距離')?></li></a>
                <a class="col-xs-4" href="<?=site_url('home/mission_price')?>"><li><?=lang('價格')?></li></a>
                <a class="col-xs-4 active" href="<?=site_url('home/mission_map')?>"><li><?=lang('地圖')?></li></a>
                <?php if(is_login()){ ?>
                    <a class="col-xs-4 " href="<?=site_url('home/mission_list')?>"><li><?=lang('任務清單')?></li></a>
                <?php }else{ ?>
                    <a class="col-xs-4 " href="###" onclick="prop_login();"><li><?=lang('任務清單')?></li></a>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <?php include_once "./application/views/search.php"; ?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="input-group stylish-input-group">
                <input id="pac-input" class="controls ml-sm" type="text" placeholder="<?=lang('目的地、城市、地址')?>">
            </div>
            <!-- Google map -->
            <div class="section searchmap">
                <div id="map"></div>
                <script src="/asset/js/googleMapMyLocation.js"></script>
                <script>
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 6,
                            center: {lat: <?=config_item('default_location')['lat']?>, lng: <?=config_item('default_location')['lng']?>},
                            gestureHandling: 'greedy',
                            mapTypeControl:false,
                            streetViewControl: false,
                            mapTypeId: 'roadmap'
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
                        var markers = [];
                        // Listen for the event fired when the user selects a prediction and retrieve
                        // more details for that place.
                        searchBox.addListener('places_changed', function() {
                            var places = searchBox.getPlaces();

                            if (places.length == 0) {
                                return;
                            }

                            // Clear out the old markers.
                            markers.forEach(function(marker) {
                                marker.setMap(null);
                            });
                            markers = [];

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
                                markers.push(new google.maps.Marker({
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


                            var bound = map.getBounds();
                            var where = {
                                lat_s : bound.f.b,
                                lat_e : bound.f.f,
                                lng_s : bound.b.b,
                                lng_e : bound.b.f,
                            };
                            markers.forEach(function(marker) {
                                marker.setMap(null);
                            });
                            markers = [];
                            $.ajax({
                                url : '<?=site_url('ajax/getMissionMap')?>',
                                data : where,
                                dataType : 'json',
                                success : function(re){
                                    if(re.data){
                                        locations = re.locations;
                                        labels = re.labels;
                                        markers = locations.map(function(location, i) {
                                            return new google.maps.Marker({
                                                position: {lat:parseFloat(location.lat),lng:parseFloat(location.lng)},
                                                label: labels[i]
                                            });
                                        });
                                        markerCluster = new MarkerClusterer(map, markers,
                                            {imagePath: '/asset/img/pin/s' });
                                        render_bottom(re.data);
                                    }else{
                                        swiper.removeAllSlides();
                                        swiper.update();
                                    }
                                }
                            });
                        });
                        map.addListener('tilesloaded',function(){
                            var bound = map.getBounds();
                            var where = {
                                lat_s : bound.f.b,
                                lat_e : bound.f.f,
                                lng_s : bound.b.b,
                                lng_e : bound.b.f,
                            };
                            markers.forEach(function(marker) {
                                marker.setMap(null);
                            });
                            markers = [];
                            $.ajax({
                                url : '<?=site_url('ajax/getMissionMap')?>',
                                data : where,
                                dataType : 'json',
                                success : function(re){
                                    if(re.data){
                                        locations = re.locations;
                                        labels = re.labels;
                                        markers = locations.map(function(location, i) {
                                            return new google.maps.Marker({
                                                position: {lat:parseFloat(location.lat),lng:parseFloat(location.lng)},
                                                label: labels[i]
                                            });
                                        });
                                        markerCluster = new MarkerClusterer(map, markers,
                                            {imagePath: '/asset/img/pin/s' });
                                        render_bottom(re.data);
                                    }else{
                                        swiper.removeAllSlides();
                                        swiper.update();
                                    }
                                }
                            });
                        });
                        var markerCluster = new MarkerClusterer(map, markers,
                            {imagePath: '/asset/img/pin/s' });


                    }
                </script>
                <script src="/asset/js/markerclusterer.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=<?=config_item("googleMapApi")?>&libraries=places&callback=initMap" async defer></script>
            </div>
            <div class="swiper-container swiper-mission">
                <div class="swiper-wrapper searchmap search_map_bottom">
                </div>
                <!-- Add Scrollbar -->
                <!-- <div class="swiper-scrollbar"></div> -->
            </div>
            <div class="gap-10"></div>
            <div class="gap-100 hidden-lg-down"></div>
            <div class="gap-40 hidden-lg-down"></div>
        </div>
    </div>
</div>
<script src="/asset/js/template-web.js"></script>
<script id="temp" type="text/html">
    <div class="swiper-slide">
        <div class="swiper-slide">
            <article class="hentry blog-post blog-post-v1">
                <div class="post-thumb"  onclick="location.href='<?=site_url('home/mission_detail')?>/{{id}}'">
                    <a href="###" onclick="mission_star2({{id}})" id="mission_star_2_{{id}}">
                        <span class="collect <% if(star){ %>add<% } %>"><i class="fa fa-star<% if(!star){ %>-o<% } %>" aria-hidden="true"></i></span>
                    </a>
                    <a class="" href="<?=site_url('home/mission_detail')?>/{{id}}" title="" target="_blank">
                        <img src="{{media_url}}">
                    </a>
                    <div class="post-content">
                        <a href="<?=site_url('home/mission_detail')?>/{{id}}" class="h6 post-title">{{title}}</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</script>
<script>
    function render_bottom(data){
        swiper.removeAllSlides();
        for(var i=0;i<data.length;i++){
            swiper.appendSlide(template('temp',data[i]));
        }
        swiper.update();
    }
</script>

<?php include_once "./application/views/footer.php"; ?>
<!-- Js effects for material design. + Tooltips -->

<script src="/asset/js/material.min.js"></script>
<!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
<script src="/asset/js/theme-plugins.js"></script>
<!-- Init functions -->
<script src="/asset/js/main.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Swiper / Sliders -->
<script src="/asset/js/swiper.jquery.min.js"></script>

<script>
    $('#search-icon,#m-search').click(function(){
        $("#search-form").toggle(1000);
    });
</script>
<script type="text/javascript">
    var swiper;
    $(document).ready(function(){
        initSwiper();
    });
    function initSwiper(){
        swiper = new Swiper('.swiper-container', {
            mode:'horizontal',
            // loop: false,
            slidesPerView: 'auto',
            grabCursor: true, //设置为true时，鼠标覆盖Swiper时指针会变成手掌形状，拖动时指针会变成抓手形状。
            spaceBetween: 8, //slide之间的距离（单位px）
            observer: true, //启动动态检查器
            observeParents: true, //将observe应用于Swiper的父元素。当Swiper的父元素变化时，例如window.resize，Swiper更新。
            touchRatio : 2,
            // autoplay: 1000,
        });
    }
</script>
<script>
    // JavaScript Document 防止右鍵
    $(function(){
        $(document).bind("contextmenu",function(e){ return false; });
    });
    if (typeof(document.onselectstart) != "undefined") {
        // IE下禁止元素被选取
        document.onselectstart = new Function("return false");
    } else {
        // firefox下禁止元素被选取的变通办法
        document.onmousedown = new Function("return false");
        document.onmouseup = new Function("return true");
    }
</script>
</body>
</html>