<head>
  <style>
    #map_wrapper {
      height: 400px;
    }

    #map_canvas {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>
  <div id="page-wrapper">

    <div id="map_wrapper">
      <div id="map_canvas" class="mapping"></div>
    </div>
  
<form>
<div class="form-group">
{{ csrf_field() }}
     <label>Select station:
      <select id="station" name="station">
        @foreach($stations as $station )
        <option name ="s" value="{{$station->station_name}}">{{$station->station_name}}</option>
        @endforeach
      </select>
      <input type="submit" onclick="test()" value="click">
    <div class="clearfix"> </div>
    <p id="demo"></p>
    </label>
</div>
</form>

  


   
    
  </div>
  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">

    function showplace() {
       var x = document.getElementById("station").value;
      document.getElementById("demo").innerHTML = x;
      // var y = document.getElementById("map").value;
      

    }

    jQuery(function ($) {
      // Asynchronously Load the map API 
      var script = document.createElement('script');
      script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
      document.body.appendChild(script);
    });

    function initialize() {
      var map;
      var bounds = new google.maps.LatLngBounds();
      var mapOptions = {
        mapTypeId: 'roadmap'
      };

      // Display a map on the page
      map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
      map.setTilt(45);

      // Multiple Markers
      var markers = [
        ['Hua Lamphong Station, Krung Thep Maha Nakhon',
          13.739201, 100.516704
        ],

        //13.7392, 100.5157],
        //['Palace of Westminster, London', 51.499633, -0.124755]
      ];

      // Info Window Content
      var infoWindowContent = [
        ['<div class="info_content">' +
          '<h3>สถานีรถไฟหัวลำโพง</h3>' +
          '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +
          '</div>'
        ]
      ];

      // Display multiple markers on a map
      var infoWindow = new google.maps.InfoWindow(),
        marker, i;

      // Loop through our array of markers & place each one on the map  
      for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
        });

        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
          return function () {
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
          }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
      }

      // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
        this.setZoom(17);
        google.maps.event.removeListener(boundsListener);
      });

    }
    
    
    function station() {
      var name = document.getElementById("station").value;
     document.getElementById("demo").innerHTML = name;
   
     


      
      var map;
      var bounds = new google.maps.LatLngBounds();
      var mapOptions = {
        mapTypeId: 'roadmap'
      };

      // Display a map on the page
      map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
      map.setTilt(45);

      // Multiple Markers
      var markers = [
        ['Hor-Nok-Hook Cafe, Krung Thep Maha Nakhon',
       18.783681, 99.016951
        ],
        

        //13.7392, 100.5157],
        //['Palace of Westminster, London', 51.499633, -0.124755]
      ];

      // Info Window Content
      var infoWindowContent = [
        ['<div class="info_content">' +
          '<h3>เย้</h3>' +
          '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +
          '</div>'
        ]
      ];

      // Display multiple markers on a map
      var infoWindow = new google.maps.InfoWindow(),
        marker, i;

      // Loop through our array of markers & place each one on the map  
      for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
        });

        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
          return function () {
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
          }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
      }

      // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
        this.setZoom(17);
        google.maps.event.removeListener(boundsListener);
      });

    }
  </script>

</body>