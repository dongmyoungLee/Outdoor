
$(document).ready(function(){
   $(".rs_wrap i").click(function(){
        $("#top .frame .menu").addClass("active");
        $(".dark").addClass("active");
        $("#top").css("position", "static");
   });

   $(".close").click(function(){
        $("#top .frame .menu").removeClass("active");
        $(".dark").removeClass("active");
        $("#top").css("position", "fixed");
   });
});