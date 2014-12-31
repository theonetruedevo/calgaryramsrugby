/**
 * @file
 * Javascript for elimai theme.
 */

(function ($) {

Drupal.behaviors.elimai = {
  attach: function (context) {
    $('.carousel').carousel();
    // Removing the pagination item-list class for twitter bootstrap.
    $('.pagination > div').removeClass('item-list');

    // Making the content div 100% for no-sidebars pages.
    if($('body').hasClass('no-sidebars')) {
      $('#main-wrapper #content').removeClass('span8');
      $('#main-wrapper #content').addClass('span12');
    }
    else{
      $('#main-wrapper #content').removeClass('span12');
      $('#main-wrapper #content').addClass('span8');
    }

      // Main menu superfish
      //$('#main-menu > ul').addClass('dropdown-menu sf-menu');
      //$('#main-menu > ul').superfish({
      //    delay: 200,
      //    animation: {opacity:'show', height:'show'},
      //    speed: 'fast',
      //    cssArrows: false,
      //    disableHI: true
      //});

      // Mobile Menu
      $('#navigation-toggle').sidr({
          name: 'sidr-main',
          source: '#sidr-close, #site-navigation',
          side: 'left'
      });
      $(".sidr-class-toggle-sidr-close").click( function() {
          $.sidr('close', 'sidr-main');
          return false;
      });
  }
}

})(jQuery);
