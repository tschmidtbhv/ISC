$j = jQuery.noConflict();

$j(document).ready(function() {
    
    /** Menüs **/
    $j("ul.menu li:first a:eq(0)").attr("class", "first");
    $j("ul.menu li.deeper:last a:eq(0)").attr("class", "last");
           
    if (window.PIE) {
        $j('body').find('*').each(function() {
         PIE.attach(this);
         });
     }
  
});