(function ($) {

// Store our function as a property of Drupal.behaviors.
Drupal.behaviors.firangiland_custom = {
  attach: function (context, settings) {
    // Find all the secure links inside context that do not have our processed
    // class.
    $('.restaurant-body').shorten({

      "showChars" : 500,
      "moreText"  : "See More",

      });
  }
};

// You could add additional behaviors here.
// Drupal.behaviors.myModuleMagic = {
//   attach: function (context, settings) { },
//   detach: function (context, settings) { }
// };

}(jQuery));