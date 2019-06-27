
<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
  </head>
  <link rel="stylesheet" type="text/css" href="{{asset('/maps/style.css')}}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/maps/assets/css/main.css')}}">

    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('/frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('/frontend/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.css')}}">
    <!-- Superfish -->
    <link rel="stylesheet" href="{{asset('/frontend/css/superfish.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('/frontend/css/magnific-popup.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-datepicker.min.css')}}">
    <!-- CS Select -->
    <link rel="stylesheet" href="{{asset('/frontend/css/cs-select.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/cs-skin-border.css')}}">
    
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
  <body>
    @include('frontEnd.includes.header')
    <div class="container">

     <div id="findhotels">
      Find hotels in:
       <div id="locationField">
      <input id="autocomplete" placeholder="Enter a city" type="text" />
    </div>

    <div id="controls">
      <select id="country">
        <option value="all">All</option>
        <option value="au">Australia</option>
        <option value="br">Brazil</option>
        <option value="ca">Canada</option>
        <option value="fr">France</option>
        <option value="de">Germany</option>
        <option value="mx">Mexico</option>
        <option value="nz">New Zealand</option>
        <option value="it">Italy</option>
        <option value="za">South Africa</option>
        <option value="es">Spain</option>
        <option value="pt">Portugal</option>
        <option value="us" selected>U.S.A.</option>
        <option value="uk">United Kingdom</option>
      </select>
    </div>
     <div id="listing">
      <table id="resultsTable">
        <tbody id="results"></tbody>
      </table>
    </div>


    </div>


    <div id="map"></div>


    <div style="display: none">
      <div id="info-content">
        <table>
          <tr id="iw-url-row" class="iw_table_row">
            <td id="iw-icon" class="iw_table_icon"></td>
            <td id="iw-url"></td>
          </tr>
          <tr id="iw-address-row" class="iw_table_row">
            <td class="iw_attribute_name">Address:</td>
            <td id="iw-address"></td>
          </tr>
          <tr id="iw-phone-row" class="iw_table_row">
            <td class="iw_attribute_name">Telephone:</td>
            <td id="iw-phone"></td>
          </tr>
          <tr id="iw-rating-row" class="iw_table_row">
            <td class="iw_attribute_name">Rating:</td>
            <td id="iw-rating"></td>
          </tr>
          <tr id="iw-website-row" class="iw_table_row">
            <td class="iw_attribute_name">Website:</td>
            <td id="iw-website"></td>
          </tr>
        </table>
      </div>
    </div>
</div>
    <div id="wrapper" class="divided">

        <!-- Banner -->
          <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
            <div class="content">
              <h1>Maverick</h1>
              <p>Maverick makes things easier to find. For example, if you search “hotels,” nearby spots are displayed on the map with colorful badges. When multiple restaurants are packed into a small area, Maps displays a numbered badge that you can tap to reveal options. You can also use the Nearby feature, which lists the places around you in categories like Food, Drink, and Shopping.</p>
            </div>
            <div class="image">
              <img src="maps/img/9.jpg" alt="" />
            </div>
          </section>

        <!-- Spotlight -->
          <section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
            <div class="content">
              <h2>Search</h2>
              <p>When you’re on the move, Maps helps you find the way to your destination with turn-by-turn spoken directions, guidance on which lane you should be in, and the current speed limit. Along the way, it can factor in real-time traffic information, so you’ll know exactly how long until you arrive.</p>

            </div>
            <div class="image">
              <img src="maps/img/2.jpg" alt="" />
            </div>
          </section>

        <!-- Spotlight -->
          <section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
            <div class="content">
              <h2>Spotlight</h2>
              <p>Bringing you public transit information for subways, buses, trains, and ferries, the Transit feature is customized for each city where it’s available. Plan a route, pull up schedules, get step-by-step directions, or ask Siri to guide you. You can even favorite a specific transit line to get up-to-date information and reminders. The list of places supported with Transit is growing.</p>


            </div>
            <div class="image">
              <img src="maps/img/7.jpg" alt="" />
            </div>
          </section>

        <!-- Spotlight -->

      </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>

    <!-- Note: Only needed for demo purposes. Delete for production sites. -->
      <script src="assets/js/demo.js"></script>


    <script>
      // This example uses the autocomplete feature of the Google Places API.
      // It allows the user to find all hotels in a given place, within a given
      // country. It then displays markers for all the hotels returned,
      // with on-click details for each hotel.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map, places, infoWindow;
      var markers = [];
      var autocomplete;
      var countryRestrict = {'country': 'us'};
      var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
      var hostnameRegexp = new RegExp('^https?://.+?/');

      var countries = {
        'au': {
          center: {lat: -25.3, lng: 133.8},
          zoom: 8
        },
        'br': {
          center: {lat: -14.2, lng: -51.9},
          zoom: 8
        },
        'ca': {
          center: {lat: 62, lng: -110.0},
          zoom: 8
        },
        'fr': {
          center: {lat: 46.2, lng: 2.2},
          zoom: 8
        },
        'de': {
          center: {lat: 51.2, lng: 10.4},
          zoom: 8
        },
        'mx': {
          center: {lat: 23.6, lng: -102.5},
          zoom: 8
        },
        'nz': {
          center: {lat: -40.9, lng: 174.9},
          zoom: 8
        },
        'it': {
          center: {lat: 41.9, lng: 12.6},
          zoom: 8
        },
        'za': {
          center: {lat: -30.6, lng: 22.9},
          zoom: 8
        },
        'es': {
          center: {lat: 40.5, lng: -3.7},
          zoom: 8
        },
        'pt': {
          center: {lat: 39.4, lng: -8.2},
          zoom: 8
        },
        'us': {
          center: {lat: 37.1, lng: -95.7},
          zoom: 6
        },
        'uk': {
          center: {lat: 54.8, lng: -4.6},
          zoom: 8
        }
      };

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: countries['us'].zoom,
          center: countries['us'].center,
          mapTypeControl: false,
          panControl: false,
          zoomControl: false,
          streetViewControl: false
        });

        infoWindow = new google.maps.InfoWindow({
          content: document.getElementById('info-content')
        });

        // Create the autocomplete object and associate it with the UI input control.
        // Restrict the search to the default country, and to place type "cities".
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */ (
                document.getElementById('autocomplete')), {
              types: ['(cities)'],
              componentRestrictions: countryRestrict
            });
        places = new google.maps.places.PlacesService(map);

        autocomplete.addListener('place_changed', onPlaceChanged);

        // Add a DOM event listener to react when the user selects a country.
        document.getElementById('country').addEventListener(
            'change', setAutocompleteCountry);
      }

      // When the user selects a city, get the place details for the city and
      // zoom the map in on the city.
      function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
          map.panTo(place.geometry.location);
          map.setZoom(15);
          search();
        } else {
          document.getElementById('autocomplete').placeholder = 'Enter a city';
        }
      }

      // Search for hotels in the selected city, within the viewport of the map.
      function search() {
        var search = {
          bounds: map.getBounds(),
          types: ['lodging']
        };

        places.nearbySearch(search, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            clearResults();
            clearMarkers();
            // Create a marker for each hotel found, and
            // assign a letter of the alphabetic to each marker icon.
            for (var i = 0; i < results.length; i++) {
              var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
              var markerIcon = MARKER_PATH + markerLetter + '.png';
              // Use marker animation to drop the icons incrementally on the map.
              markers[i] = new google.maps.Marker({
                position: results[i].geometry.location,
                animation: google.maps.Animation.DROP,
                icon: markerIcon
              });
              // If the user clicks a hotel marker, show the details of that hotel
              // in an info window.
              markers[i].placeResult = results[i];
              google.maps.event.addListener(markers[i], 'click', showInfoWindow);
              setTimeout(dropMarker(i), i * 100);
              addResult(results[i], i);
            }
          }
        });
      }

      function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
          if (markers[i]) {
            markers[i].setMap(null);
          }
        }
        markers = [];
      }

      // Set the country restriction based on user input.
      // Also center and zoom the map on the given country.
      function setAutocompleteCountry() {
        var country = document.getElementById('country').value;
        if (country == 'all') {
          autocomplete.setComponentRestrictions({'country': []});
          map.setCenter({lat: 15, lng: 0});
          map.setZoom(2);
        } else {
          autocomplete.setComponentRestrictions({'country': country});
          map.setCenter(countries[country].center);
          map.setZoom(countries[country].zoom);
        }
        clearResults();
        clearMarkers();
      }

      function dropMarker(i) {
        return function() {
          markers[i].setMap(map);
        };
      }

      function addResult(result, i) {
        var results = document.getElementById('results');
        var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
        var markerIcon = MARKER_PATH + markerLetter + '.png';

        var tr = document.createElement('tr');
        tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
        tr.onclick = function() {
          google.maps.event.trigger(markers[i], 'click');
        };

        var iconTd = document.createElement('td');
        var nameTd = document.createElement('td');
        var icon = document.createElement('img');
        icon.src = markerIcon;
        icon.setAttribute('class', 'placeIcon');
        icon.setAttribute('className', 'placeIcon');
        var name = document.createTextNode(result.name);
        iconTd.appendChild(icon);
        nameTd.appendChild(name);
        tr.appendChild(iconTd);
        tr.appendChild(nameTd);
        results.appendChild(tr);
      }

      function clearResults() {
        var results = document.getElementById('results');
        while (results.childNodes[0]) {
          results.removeChild(results.childNodes[0]);
        }
      }

      // Get the place details for a hotel. Show the information in an info window,
      // anchored on the marker for the hotel that the user selected.
      function showInfoWindow() {
        var marker = this;
        places.getDetails({placeId: marker.placeResult.place_id},
            function(place, status) {
              if (status !== google.maps.places.PlacesServiceStatus.OK) {
                return;
              }
              infoWindow.open(map, marker);
              buildIWContent(place);
            });
      }

      // Load the place information into the HTML elements used by the info window.
      function buildIWContent(place) {
        document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
            'src="' + place.icon + '"/>';
        document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
            '">' + place.name + '</a></b>';
        document.getElementById('iw-address').textContent = place.vicinity;

        if (place.formatted_phone_number) {
          document.getElementById('iw-phone-row').style.display = '';
          document.getElementById('iw-phone').textContent =
              place.formatted_phone_number;
        } else {
          document.getElementById('iw-phone-row').style.display = 'none';
        }

        // Assign a five-star rating to the hotel, using a black star ('&#10029;')
        // to indicate the rating the hotel has earned, and a white star ('&#10025;')
        // for the rating points not achieved.
        if (place.rating) {
          var ratingHtml = '';
          for (var i = 0; i < 5; i++) {
            if (place.rating < (i + 0.5)) {
              ratingHtml += '&#10025;';
            } else {
              ratingHtml += '&#10029;';
            }
          document.getElementById('iw-rating-row').style.display = '';
          document.getElementById('iw-rating').innerHTML = ratingHtml;
          }
        } else {
          document.getElementById('iw-rating-row').style.display = 'none';
        }

        // The regexp isolates the first part of the URL (domain plus subdomain)
        // to give a short URL for displaying in the info window.
        if (place.website) {
          var fullUrl = place.website;
          var website = hostnameRegexp.exec(place.website);
          if (website === null) {
            website = 'http://' + place.website + '/';
            fullUrl = website;
          }
          document.getElementById('iw-website-row').style.display = '';
          document.getElementById('iw-website').textContent = website;
        } else {
          document.getElementById('iw-website-row').style.display = 'none';
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2MfFapSzQA9B2VS6d2pO1V35vrSJ2FFA&libraries=places&callback=initMap"
        async defer></script>

        @include('frontEnd.includes.footer')
  </body>
</html>

