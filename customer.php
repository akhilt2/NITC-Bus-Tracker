<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NITC BUS SERVICE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--  Include Fonts-->    
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Splash&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Bootstrap -->
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="styles.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
     <style>
         .navbar-brand{
            font-family: "Ubuntu";
            font-size: 1.875em;
            }
        .map {
            height: 600px;
            width: 100%;
        }
        </style>
  </head>
  <body>
       <section id="title">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;" >
        <a class="navbar-brand" href="https://nitc.ac.in/"><img src="/images/NITCLOGO.png" width="30" height="35" class="d-inline-block align-top" alt="">NITC BUS SERVICES </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="text-align: right;">
            <li class="nav-item active">
              <a class="nav-link" ><img src="/images/lh.png" width="40" height="45" class="d-inline-block align-top" alt="">LH BUS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"> <img src="/images/mhb1.png" width="40" height="45" class="d-inline-block align-top" alt="">MHB-1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " ><img src="/images/mhb2.png" width="40" height="45" class="d-inline-block align-top" alt="">MHB-2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"><img src="/images/soms.png" width="40" height="45" class="d-inline-block align-top" alt="">SOMS</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="logout.php">LOGOUT</a>
            </li>
            
          </ul>
          </div>
      </nav>
        </section>
    <main class="container">
      <div id="map" class="map"></div>
    </main>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    function createMap() {
        const map = L.map('map').setView([11.321069, 75.934527], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        return map;
    }

    function markStopsOnMap(map) {
        const stops = [
            { lat: 11.323184, lng: 75.937227 },
            { lat: 11.322876, lng: 75.936427 },
            { lat: 11.322384, lng: 75.935592 },
            { lat: 11.321069, lng: 75.934527 },
            { lat: 11.31999, lng: 75.932751 },
            { lat: 11.319095, lng: 75.938109 },
            { lat: 11.31719, lng: 75.93757 },
            { lat: 11.321499, lng: 75.934044 }
        ];

        stops.forEach(stop => {
            L.marker([stop.lat, stop.lng], {
                icon: L.icon({
                    iconUrl: '/images/bus-stop (1).png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41]
                })
            }).addTo(map);
        });
    }

    function changeMarkerPosition(marker, new_latitude, new_longitude) {
        marker.setLatLng([new_latitude, new_longitude]);
    }

    function retrieveData(map, lh_bus, soms_bus, mhb1_bus, mhb2_bus) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'collect_data.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);

                changeMarkerPosition(lh_bus, data[0].latitudes, data[0].longitudes);
                changeMarkerPosition(soms_bus, data[1].latitudes, data[1].longitudes);
                changeMarkerPosition(mhb1_bus, data[2].latitudes, data[2].longitudes);
                changeMarkerPosition(mhb2_bus, data[3].latitudes, data[3].longitudes);
            }
        };
        xhr.send();
    }

    function initMap() {
        const map = createMap();
        markStopsOnMap(map);

        var lh_bus = L.marker([0, 0], {
            icon: L.icon({
                iconUrl: '/images/lh_marker.png',
                iconSize: [30, 30]
            })
        }).addTo(map);

        var soms_bus = L.marker([0, 0], {
            icon: L.icon({
                iconUrl: '/images/soms_marker.png',
                iconSize: [30, 30]
            })
        }).addTo(map);

        var mhb1_bus = L.marker([0, 0], {
            icon: L.icon({
                iconUrl: '/images/mhb1_marker.png',
                iconSize: [30, 30]
            })
        }).addTo(map);

        var mhb2_bus = L.marker([0, 0], {
            icon: L.icon({
                iconUrl: '/images/mhb2_marker.png',
                iconSize: [30, 30]
            })
        }).addTo(map);

        retrieveData(map, lh_bus, soms_bus, mhb1_bus, mhb2_bus);
        setInterval(function () {
            retrieveData(map, lh_bus, soms_bus, mhb1_bus, mhb2_bus);
        }, 1000);
    }

    window.onload = initMap;
    </script>
  </body>
</html>
