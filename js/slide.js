//menu
$(document).ready(function(){
  
  $('li.mainlevel').mousemove(function(){
  $(this).find('ul').fadeIn("fast");//you can give it a speed
  });
  $('li.mainlevel').mouseleave(function(){
  $(this).find('ul').fadeOut("fast");
  });
  
});