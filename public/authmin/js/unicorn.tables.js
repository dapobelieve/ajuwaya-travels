
$(document).ready(function(){
	
	$('.data-table').dataTable({
		dom: 'lBfrtip',
		// "sDom": '',
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		buttons: [
	        {
	            extend: 'copyHtml5',
	            exportOptions: {
	             columns: ':contains("Office")'
	            }
	        },
	        {
	            extend: 'pdfHtml5',
	            message: 'PDF created by PDFMake with Buttons for DataTables.'
	        },
	        // 'excelHtml5',
	        // 'csvHtml5',
	        // 'pdfHtml5',
	        'print'
	    ],

		
	});
});
