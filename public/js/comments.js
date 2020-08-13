//comments
$(document).on('click', '.reply', function() {
	elm = $(this)[0].parentElement.parentElement.parentElement.children[2];
	$(elm).removeClass('hidden');
});

$(document).on('click', '.load', function() {
	count_comments = $('#count_comments').val();
	product_id = $('#product_id').val();
	  	$.ajax({
	        url: '/api/comments/get-comments',
	        type: 'GET',
		    data: {
		    	'_token': $("input[name*='_token']").val(),
		        'count_comments': count_comments,
		        'product_id': product_id,
		   	},
		    datatype: 'json',
		    success: function (data) {
		    	$( "#comments" ).append(data.view);
		    	toltal_comments = $( "#toltal_comments" ).val();
		    	if (toltal_comments <= data.count) {
		    		$($('.load')[0]).addClass('hidden');
		    	}
		    	$( "#count_comments" ).val(data.count);
	        },
	        error: function (error) {
		       	alert("Hệ thống đang bảo trì");
		    }
		});
});