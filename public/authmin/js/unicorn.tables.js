$(document).ready(function(){
	
	$('.data-table').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		buttons: [
        	'print'
    ]
		// "sDom": '<""l>t<"F"fp>'
	});
});
