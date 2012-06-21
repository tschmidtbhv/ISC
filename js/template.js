$j = jQuery.noConflict();

$j(document).ready(function() {
    
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