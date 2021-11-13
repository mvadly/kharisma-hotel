
$(document).ready(function(){
	
	$('input[type="text"], input[type="password"], textarea, select').each(function() {
		$(this).val( $(this).attr('placeholder') );
    });
	
});