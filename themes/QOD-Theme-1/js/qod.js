$(function(){

    var $quote = $(".post p:first");
    
    var $words = $quote.text().split(" ");
    var $numWords = $words.length;
    
    if (($numWords >= 1) && ($numWords < 10)) {
        $quote.css("font-size", "36px");
    }
    else if (($numWords >= 10) && ($numWords < 20)) {
        $quote.css("font-size", "32px");
    }
    else if (($numWords >= 20) && ($numWords < 30)) {
        $quote.css("font-size", "28px");
    }
    else if (($numWords >= 30) && ($numWords < 40)) {
        $quote.css("font-size", "24px");
    }
    else {
        $quote.css("font-size", "20px");
    }    
	
});
