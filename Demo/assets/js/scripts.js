
jQuery(document).ready(function() {
  
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.jpg");

    jQuery('#arrivalTime').datetimepicker();
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
      $.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
      $.backstretch("resize");
    });
    
    /*
      Contact form
  */
  $('.contact-form form input[type="text"], .contact-form form textarea').on('focus', function() {
    $('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
  });
  $('.contact-form form').submit(function(e) {
    e.preventDefault();
      $('.contact-form form input[type="text"], .contact-form form textarea').removeClass('input-error');
      var postdata = $('.contact-form form').serialize();
      $.ajax({
          type: 'POST',
          url: 'http://192.168.6.167:8888/Instahack/porter_server.php',
          data: postdata,
          dataType: 'jsonp',
          success: function(json) {
              // if(json.response == 'ok') {
              //     $('.contact-form form').fadeOut('fast', function() {
              //       $.backstretch("resize");
              //         // reload background
              //     });
              // }
          }
      });
      // window.location.href='success.php'
  });
    
    $(document).on('click','#showMapBtn',function() {
      var lat = $locationInfo.lat;
      var lng = $locationInfo.lng;
      var latLng = {lat: lat, lng: lng};

      if(lat == '' || lat == undefined || lng == '' || lng == undefined ) {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
          latLng = {lat: position.coords.latitude, lng: position.coords.longitude};
          createMap(latLng);
          });
        } else {
        }       
      } // user has set the location
      else {
        createMap(latLng);
      }
    })
    
});


//////// Core JS //////////

/// Google Maps API ///
$locationInfo = {
  lat: null,
  lng: null,
  streetNumber: null,
  street: null,
  city: null,
  state: null,
  country: null,
  postalCode: null,
  reset: function () {
    this.lat = null;
    this.lng = null;
    this.streetNumber = null;
    this.street = null;
    this.city = null;
    this.state = null;
    this.country = null;
    this.postalCode = null;
  }
};

googleAutocomplete = {
  autocompleteField: function (fieldId) {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById(fieldId)), { types: ['geocode'] };
    google.maps.event.addListener(autocomplete, 'place_changed', function() {

      // Segment results into usable parts
      var place = autocomplete.getPlace(),
          address = place.address_components,
          lat = place.geometry.location.lat();
          lng = place.geometry.location.lng();

      // Reset location object
      $locationInfo.reset();

      // Save address components (US only)
      $locationInfo.lat = lat;
      $locationInfo.lng = lng;

      $('#lonInput').val(lng);
      $('#latInput').val(lat);
      for(var i=0; i<address.length; i++) {
        var component = address[i].types[0];
        switch (component) {
          case 'street_number':
            $locationInfo.streetNumber = address[i]['long_name'];
            break;
          case 'route':
            $locationInfo.street = address[i]['long_name'];
            break;
          case 'locality':
            $locationInfo.city = address[i]['long_name'];
            break;
          case 'administrative_area_level_1':
            $locationInfo.state = address[i]['long_name'];
            break;
          case 'country':
            $locationInfo.country = address[i]['long_name'];
            break;
          case 'postal_code':
            $locationInfo.postalCode = address[i]['long_name'];
            break;
          default:
            break;
        }
      }
      
      // Example output
      // console.log(JSON.stringify($locationInfo, null, 4));
    });
  }
};

// Attach listener to field
googleAutocomplete.autocompleteField('autoField');


function createMap(latLng) {
  findPorters(latLng); // function defined in controller.js

  // var map = new google.maps.Map(document.getElementById('map'), {
  //   center: latLng,
  //   zoom: 14
  // });

  // var center = map.getCenter();

  // var marker = new google.maps.Marker({
  //     position: latLng,
  //     map: map,
  //     title: 'Matched Location'
  //   });
  
  // google.maps.event.addListenerOnce(map, 'idle', function() {
  //     google.maps.event.trigger(map, 'resize');
  //   map.setCenter(center);
  // });

  // var circle = new google.maps.Circle({
  //   map: map,
  //   radius: 1200,    // 10 miles in metres
  //   fillOpacity: 0.3,
  //   strokeOpacity: 0.3,
  //   strokeColor: '#5394F1',
  //   fillColor: '#5394F1'
  // });
  // circle.bindTo('center', marker, 'position');
};