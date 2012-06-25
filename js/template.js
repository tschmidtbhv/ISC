$j = jQuery.noConflict();

$j(document).ready(function() {
    
    /** Menüs **/
    $j("ul.menu li:first a:eq(0)").attr("class", "first");
    $j("ul.menu li.deeper:last a:eq(0)").attr("class", "last");
    
    /** Ausfahrbare tolle Box **/
    $j("#specialRightBox form").css("display", "none");
    $j("#specialRightBox").css("width", "0px").css("right", "-60px");
     
    $j("#specialRightBox").mouseenter(function() {
        $j("#specialRightBox form").css("display", "block");
        $j("#specialRightBox").animate({width: "200px", right: "-240px"}, 500);
    }).mouseleave(function() {
        $j("#specialRightBox form").css("display", "none");        
        $j("#specialRightBox").animate({width: "0px", right: "-60px"}, 500);
    });
    
});