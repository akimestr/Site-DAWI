/* EVENTO SCROLL -> MUDAR O MENU

jQuery(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 400) {
     $("#menu").addClass("menu-diferente");
    } else {
     $("#menu").removeClass("menu-diferente");
    }
  });
}); */

$(window).bind('scroll', function () {
      if ($(window).scrollTop() > 350) {
        $(".menu_mluv_retratil").addClass('mostrar');
      } else if ($(window).scrollTop() < 350) {
        $(".menu_mluv_retratil").removeClass('mostrar');
      }
});