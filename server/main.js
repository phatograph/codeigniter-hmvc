;$(function() {
  var controllerName = (window.location.pathname.split("/")[1] || 'home'),
      mainNavigation = $('.mainNavigation'),
      controllerList = ['home', 'info', 'sell', 'rent', 'contact']
  ;
  
  if(mainNavigation && $.inArray(controllerName, controllerList)) {
    mainNavigation.find('li.' + controllerName).addClass('selected');
  }
  
});