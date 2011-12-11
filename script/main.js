;$(function() {
  var controllerName = (window.location.pathname.split("/")[2] || 'home'),
      mainNavigation = $('.mainNavigation'),
      controllerList = ['home', 'info', 'sell', 'rent', 'contact']
  ;
  
  if(mainNavigation && ~controllerList.indexOf(controllerName) !== 0) {
    mainNavigation.find('li.' + controllerName).addClass('selected');
  }
  
});