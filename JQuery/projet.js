$(document).ready(function(){

    $("#NP,#SJ,#JA,#RM,#MC").hide();

    $("#marion, .marion").click(function(){
        
        $("#jessica").css("left","890px");
        $("#marion").css("left","1170px");
        $("#natalie").css("left","750px");
        $("#rachel").css("left","1030px");
        $("#MC").show();
        $("#RM,#SJ,#JA,#NP").hide();
        $("#marion").toggleClass("cotillardbw");
        $("#marion").toggleClass("cotillard");
        $("#scarlett").removeClass("johansson");
        $("#scarlett").addClass("johanssonbw");
        $("#jessica").removeClass("alba");
        $("#jessica").addClass("albabw");
        $("#rachel").removeClass("mcadams");
        $("#rachel").addClass("mcadamsbw");
        $("#natalie").removeClass("portman");
        $("#natalie").addClass("portmanbw");
        
    
    })

    $("#rachel, .rachel").click(function(){
        
        $("#jessica").css("left","890px");
        $("#marion").css("left","1170px");
        $("#natalie").css("left","750px");
        $("#rachel").css("left","1030px");
        $("#RM").show();
        $("#MC,#SJ,#JA,#NP").hide();
        $("#marion").animate({left: "+=250px"},500);
        $("#rachel").toggleClass("mcadamsbw");
        $("#rachel").toggleClass("mcadams");
        $("#marion").removeClass("cotillard");
        $("#marion").addClass("cotillardbw");
        $("#jessica").removeClass("alba");
        $("#jessica").addClass("albabw");
        $("#scarlett").removeClass("johansson");
        $("#scarlett").addClass("johanssonbw");
        $("#natalie").removeClass("portman");
        $("#natalie").addClass("portmanbw");
        
    
    })

    $("#natalie,.natalie").click(function(){
        
        $("#jessica").css("left","890px");
        $("#marion").css("left","1170px");
        $("#natalie").css("left","750px");
        $("#rachel").css("left","1030px");
        $("#NP").show();
        $("#MC,#SJ,#JA,#RM").hide();
        $("#marion,#jessica,#rachel").animate({left: "+=250px"},500);
        $("#natalie").toggleClass("portmanbw");
        $("#natalie").toggleClass("portman");
        $("#marion").removeClass("cotillard");
        $("#marion").addClass("cotillardbw");
        $("#jessica").removeClass("alba");
        $("#jessica").addClass("albabw");
        $("#rachel").removeClass("mcadams");
        $("#rachel").addClass("mcadamsbw");
        $("#scarlett").removeClass("johansson");
        $("#scarlett").addClass("johanssonbw");
        
    
    })

    $("#jessica,.jessica").click(function(){
        
        $("#jessica").css("left","890px");
        $("#marion").css("left","1170px");
        $("#natalie").css("left","750px");
        $("#rachel").css("left","1030px");
        $("#marion,#rachel").animate({left: "+=250px"},500);
        $("#JA").show();
        $("#MC,#SJ,#RM,#NP").hide();
        $("#jessica").toggleClass("albabw");
        $("#jessica").toggleClass("alba");
        $("#marion").removeClass("cotillard");
        $("#marion").addClass("cotillardbw");
        $("#scarlett").removeClass("johansson");
        $("#scarlett").addClass("johanssonbw");
        $("#rachel").removeClass("mcadams");
        $("#rachel").addClass("mcadamsbw");
        $("#natalie").removeClass("portman");
        $("#natalie").addClass("portmanbw");
        
    
    })

    $("#scarlett, .scarlett").click(function(){

        $("#jessica").css("left","890px");
        $("#marion").css("left","1170px");
        $("#natalie").css("left","750px");
        $("#rachel").css("left","1030px");
        $("#marion,#natalie,#rachel,#jessica").animate({left: "+=250px"},500);
        $("#SJ").show();
        $("#MC,#RM,#JA,#NP").hide();
        $("#scarlett").toggleClass("johanssonbw");
        $("#scarlett").toggleClass("johansson");
        $("#marion").removeClass("cotillard");
        $("#marion").addClass("cotillardbw");
        $("#jessica").removeClass("alba");
        $("#jessica").addClass("albabw");
        $("#rachel").removeClass("mcadams");
        $("#rachel").addClass("mcadamsbw");
        $("#natalie").removeClass("portman");
        $("#natalie").addClass("portmanbw");
        
    
    })

   

})
  





