$(function(){
    
    $("#submit-toggle").click(function(){
        $(".post").slideUp(500, function(){
            $("#submit-area").slideDown();
        });
        return false;
    });

	$("#left-col ul li a")
	.css({
	   padding: "10px"
	})
	.parent()
	.hover(function(e){
		$(this).find("a").hoverFlow(e.type, {
			width: "270px"
		}, 300)
	}, function(e) {
		$(this).find("a").hoverFlow(e.type, {
			width: "260px"
		}, 300, "easeOutBack")
	});
	
	var data = "";
	
	$("#another a").click(function(){
		$("#spinner").show();
		$("#submit-area").hide();
		$(".post").show();
		$(".post").load("/?cachebuster=" + Math.floor(Math.random()*10001) + " .post", {}, function(){
			$("#spinner").hide();
		});
		return false;
	});
	
});
