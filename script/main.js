;$(function() {
  var controllerName = (window.location.pathname.split("/")[2] || 'home'),
      aControllerName = (window.location.pathname.split("/")[3]),
      mainNavigation = $('.mainNavigation'),
      adminNav = $('.adminNav'),
      controllerList = ['home', 'info', 'sell', 'rent', 'contactus']
  ;
  
  if(mainNavigation && $.inArray(controllerName, controllerList) !== -1) {
    mainNavigation.find('li.' + controllerName).addClass('selected');
  }
  
  if(adminNav && $.inArray(aControllerName, controllerList) !== -1) {   
    adminNav.find('li.' + aControllerName).addClass('selected');
  }
  
});