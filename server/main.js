;$(function() {
  var controllerName = (window.location.pathname.split("/")[1] || 'home'),
      mainNavigation = $('.mainNavigation'),
      controllerList = ['home', 'info', 'sell', 'rent', 'contactus']
  ;
  
  if(mainNavigation && $.inArray(controllerName, controllerList) !== -1) {
    mainNavigation.find('li.' + controllerName).addClass('selected');
  }
  
});