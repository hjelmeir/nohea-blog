/*
 * Nohea Designs Custom Js
 */

jQuery( function($) {
  $('#social-menu-toggle').on('click', function() {
    $('.social-connections').slideToggle();
		$(this).parent().toggleClass("active");
  });
  /*$('.connect-with-me').hover( function() {
    connect = $(this).find('a.toggle-connect');
    showSocial = $(this).find('.social-connections');
    connect.fadeOut();
    showSocial.fadeIn();
  },
  function() {
    connect = $(this).find('a.toggle-connect');
    showSocial = $(this).find('.social-connections');
    connect.fadeIn();
    showSocial.fadeOut();
  });*/
});
