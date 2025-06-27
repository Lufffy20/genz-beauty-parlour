@include('layout.header')
<!-- services -->
<div class="services">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center ">
                     <h2>Our Services</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div id="ho_shad" class="services_box text_align_left">
                     <h3>Ayurveda</h3>
                     <figure><img src="images/service1.jpg" alt="#"/></figure>
                     <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                     <a class="read_more" href="service.html">Read More</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="ho_shad" class="services_box text_align_left">
                     <h3>hair salon</h3>
                     <figure><img src="images/service2.jpg" alt="#"/></figure>
                     <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                     <a class="read_more" href="service.html">Read More</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="ho_shad" class="services_box text_align_left">
                     <h3>Luxury makeup</h3>
                     <figure><img src="images/service3.jpg" alt="#"/></figure>
                     <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                     <a class="read_more" href="service.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end services -->

      <!-- Appointment and Nearest Beauty Parlour Section -->
<div class="appointment-section py-5">
    <div class="container text-center">
        <h2>Book an Appointment</h2>
        <button class="btn btn-success" onclick="getLocation()">Find Nearest Beauty Parlour</button>
        <div id="map" style="height: 400px; width: 100%; margin-top: 20px;"></div>
    </div>
</div>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;
        
        let map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 15
        });
        
        let service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: {lat: latitude, lng: longitude},
            radius: 5000,
            type: ['beauty_salon']
        }, function(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (let i = 0; i < results.length; i++) {
                    let place = results[i];
                    new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                        title: place.name
                    });
                }
            }
        });
    }
    
    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script>

@include('layout.footer')
