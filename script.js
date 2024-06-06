
function markSotpsOnMap() {
    // Create a new map instance
        latitude=11.321069;
      longitude=75.934527;
    const map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: latitude, lng: longitude },
      zoom: 18,
    });
      
     latitude=11.323184;
      longitude=75.937227;
      const marker1 = new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker1.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
  
    latitude=11.322876;
      longitude=75.936427;
      const marker2 = new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker2.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
       latitude=11.322384;
      longitude=75.935592;
      const marker3= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker3.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
      latitude=11.321069;
      longitude=75.934527;
      const marker4= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker4.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
     latitude=11.321499;
      longitude=75.934044;
      const marker8= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker8.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
     latitude=11.31999;
      longitude=75.932751;
      const marker5= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker5.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
     latitude=11.319095;
      longitude=75.938109;
      const marker6= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker6.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
     latitude=11.31719;
      longitude=75.93757;
      const marker7= new google.maps.Marker({
      position: { lat: latitude, lng: longitude },
      map: map,
    });
     marker7.setIcon({
          url: "C:/Users/rajit/Downloads/bus-stop (1).png"
       });
  }
  // it calls the markstop function 
  function retrieveData() {
    // Make an HTTP GET request to the API endpoint
    
    // fetch('http://http://127.0.0.1:8080//api/data')
    //   .then(response => response.json())
    //   .then(data => {
    //     // Display the retrieved data
    //     console.log('Retrieved data:', data);
    //   })
    //   .catch(error => {
    //     console.error('Error:', error);
    //   });
  }
  function getde(){
       markSotpsOnMap();
       retrieveData();
  }