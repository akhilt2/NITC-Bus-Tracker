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
     <style>
         .navbar-brand{
            font-family: "Ubuntu";
            font-size: 1.875em;
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
    <script>
    function create_map(){
          latitude=11.321069;
          longitude=75.934527;
          const map = new google.maps.Map(document.getElementById("map"), {
              center: { lat: latitude, lng: longitude },
              zoom: 16,
          });
          return map;
    }
function markSotpsOnMap(map) {
    
      latitude=11.323184;
      longitude=75.937227;
      const marker1 = new google.maps.Marker({
          position: { lat: latitude, lng: longitude },
          map: map,
      });
     marker1.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
  
      latitude=11.322876;
      longitude=75.936427;
      const marker2 = new google.maps.Marker({
          position: { lat: latitude, lng: longitude },
          map: map,
        });
     marker2.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
       latitude=11.322384;
      longitude=75.935592;
      const marker3= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker3.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
      latitude=11.321069;
      longitude=75.934527;
      const marker4= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker4.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
     latitude=11.31999;
      longitude=75.932751;
      const marker5= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker5.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
     latitude=11.319095;
      longitude=75.938109;
      const marker6= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker6.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
     latitude=11.31719;
      longitude=75.93757;
      const marker7= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker7.setIcon({
          url: "/images/bus-stop (1).png"
       });
       
       
      latitude=11.321499;
      longitude=75.934044;
      const marker8= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker8.setIcon({
          url: "/images/bus-stop (1).png"
       });
  }
  
  
  // it calls the markstop function 
 function changeMarkerPosition(marker, new_latitude, new_longitude) {

    const position = new google.maps.LatLng(new_latitude, new_longitude);
    
    //  var latitudes = parseFloat(latitude);
    //  var longitudes=parseFloat(longitude);
    //var newPosition = new google.maps.LatLng(11.1234,10.5678);
    //console.log(position);
    marker.setPosition(position);
  }
  function retrieveData(map , lh_bus,soms_bus,mhb1_bus,mhb2_bus) {
  
     var xhr = new XMLHttpRequest();
    xhr.open('GET', 'collect_data.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
             
            var data = JSON.parse(xhr.responseText);
            console.log(data);
            
              changeMarkerPosition(lh_bus,data[0].latitudes,data[0].longitudes);
              changeMarkerPosition(soms_bus,data[1].latitudes,data[1].longitudes);
              changeMarkerPosition(mhb1_bus,data[2].latitudes,data[2].longitudes);
              changeMarkerPosition(mhb2_bus,data[3].latitudes,data[3].longitudes);
            console.log(data[0].latitudes," ",data[0].longitudes);
            console.log(data[1].latitudes," ",data[1].longitudes);
            console.log(data[2].latitudes," ",data[2].longitudes);
            console.log(data[3].latitudes," ",data[3].longitudes);
            // ...
        }
    };
    xhr.send();
 //  console.log("Bolo");
//   setTimeout(retrieveData(map,marker),10000);
  }
  function getde(){
     const map= create_map();
     markSotpsOnMap(map);
     console.log("Everything perfect");
      latitude=0;
      longitude=0;
    var lh_bus= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
    lh_bus.setIcon({
        
          url: "/images/lh_marker.png",
          scaledSize: new google.maps.Size(30,30)
     });
     
    // latitude=11.31719;
    //   longitude=75.93757;
     var soms_bus= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
    soms_bus.setIcon({
        
          url: "/images/soms_marker.png",
          scaledSize: new google.maps.Size(30,30)
     });
     
     
    //   latitude=11.121069;
    //   longitude=75.934527;
     var mhb1_bus= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
   
    mhb1_bus.setIcon({
          url: "/images/mhb1_marker.png",
          scaledSize: new google.maps.Size(30,30)
     });
     
     
    //   latitude=10.321069;
    //   longitude=75.934527;
     var mhb2_bus= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
    
    mhb2_bus.setIcon({
          url: "/images/mhb2_marker.png",
          scaledSize: new google.maps.Size(30,30)
     });
     
var currentTime = new Date()
var hours = currentTime.getHours()
//console.log(sizeof(hours));
var minutes = currentTime.getMinutes()
if(hours<10){
    hours='0'+hours;
}
if (minutes < 10)
minutes = "0" + minutes
time=hours + ":" + minutes;
//   if(time>"19:00"||time<"07:19"){
//       window.alert(["Bus are sleeping dont disturb them"]);
//   }else if(time>"10:15"&&time<"10:50"){
//       window.alert(["Break for buses"]);
//       }else if(time>"11:05"&&time<"11:40"){
//           window.alert(["Break for buses"]);
//       }else if(time>"14:05"&&time<"14:55"){
//           window.alert(["Lunch Break for Drivers"]);
//       }else if(time>"15:00"&&time<"15:40"){
//           window.alert(["Break for buses"]);
//       }else {
        retrieveData(map, lh_bus,soms_bus,mhb1_bus,mhb2_bus);
        setInterval(function () {
            retrieveData(map,lh_bus,soms_bus,mhb1_bus,mhb2_bus);
        }, 1000);
//   }     
     console.log("rakudaduu");
  }</script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVueAk9Ab6c9JGcnyYR4dam2WuJMzA06w&callback=getde"></script> 
<!--    <iframe-->
<!--  width="600"-->
<!--  height="450"-->
<!--  style="border:0"-->
<!--  loading="lazy"-->
<!--  allowfullscreen-->
<!--  referrerpolicy="no-referrer-when-downgrade"-->
<!--  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDb7Q9HOMNOyv4TZE6llYUnH3miwRJjclc-->
<!--    &q=Space+Needle,Seattle+WA">-->
<!--</iframe>-->
  </body>
</html>