$(document).ready(function() {
		
});

function capcha_chek(answer){
	var ret = false;
	$.ajax({
            url: "/capt/capt.php", 
            type: "GET",             
			async: false,
            data: {act:'chek',ans:answer}, 
            success: function(data) {			data == "true" ? ret = true : ret= false; }
            });
	return ret;
}
