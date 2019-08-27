$(function(){
    
    $("#submit-toggle").click(function(){
    
        $(".post").slideUp(500, function(){
            $("#submit-area").slideDown();
        });
        
        return false;
    
    });
	
});
