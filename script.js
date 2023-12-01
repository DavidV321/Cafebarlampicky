(function($){
   $(function(){
      // sem přijde naše jQuery 
   
   /*......mobile navigation......*/

$(".jq--nav-icon").click(function(){
    
    $(".nav-backround").slideToggle(); 
    $(".mobile-nav-back").fadeToggle(); 
    $("nav ul").fadeToggle(); 
      
   });   
   
  /*podmínky změna hamburgeru na cross a zpět */
       
 $(".jq--image-hamburger").click(function(){
     
     
     if($(".jq--image-hamburger").attr("src") == "images/hamburgerMenu.png" )
    {     
   $( $(".jq--image-hamburger").attr("src","images/crossMenu.png"));
 }
    else
    {
  $( $(".jq--image-hamburger").attr("src","images/hamburgerMenu.png"));
    }
     
   });
  
   /*.......scroll icon section..........*/
       
       
$(".jq--scroll-header-text").click(function(){
    $("html, body").animate({scrollTop: $(".jq--header-text").offset().top}, 1000);
});
    
       
   }); 
})(jQuery);

    

     
     
     
     
     
     
     
     
     

 
       
