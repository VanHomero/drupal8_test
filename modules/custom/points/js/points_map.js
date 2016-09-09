(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attaches the JS test behavior to weight div.
   */
  Drupal.behaviors.pointsList = {
    attach: function (context, settings) {
      var coords = drupalSettings.points.coords;
      var map;
      var latlng = new Array();
      var markers = new Array();

      function createMarker() {
        $.each(coords, function(i, val) {
          latlng[i] = new google.maps.LatLng(val.lat, val.lon);
          markers[i] = new google.maps.Marker({
            position: latlng[i],
            map: map,
          });
        });
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0; i < latlng.length; i++) {
          bounds.extend(latlng[i]);
        }
        map.fitBounds(bounds);
      }

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -4.6828322, lng: -74.0479123},
          zoom: 12
        });
        createMarker();
      }
      google.maps.event.addDomListener(window, 'load', initMap);
    }
  };
})(jQuery, Drupal, drupalSettings);