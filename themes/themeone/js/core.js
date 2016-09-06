(function ($, Drupal) {
  Drupal.behaviors.myModuleBehavior = {
    attach: function (context, settings) {
    	console.log($('div').length);
    
    }
  };
})(jQuery, Drupal);