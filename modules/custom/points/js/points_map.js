(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attaches the JS test behavior to weight div.
   */
  Drupal.behaviors.pointsList = {
    attach: function (context, settings) {
      var coords = drupalSettings.points.coords;
      console.log(coords);
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
      google.maps.event.addDomListener(window, 'load', initMap);
    }
  };
})(jQuery, Drupal, drupalSettings);