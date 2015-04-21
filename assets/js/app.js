$(document).ready(function () {
	// navi classes
	$('body.about nav.navbar li.about').addClass('active');

	// forms
	$('#newsletter-submit input, #contact-form input').on('focusout', function(){
		$('label.error').hide();
	});

	// submit newsletter
	$("#newsletter-submit").validate({
		rules: {email: {required: true, email: true}},
		messages: {email: "Please enter a valid email address"},
		submitHandler: function(form) {
	        $('.submit-success').remove();
	        $('.submit-btn').attr('disabled', 'disabled').html('<img style="height: 40px;" src="assets/img/loader-puff.svg">');
			$.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'assets/php/subscribe.php',
	            data: $(form).serialize(),
	            success: function (data) {
	                $(form).append('<span class="submit-success"> ' + data + '</span>');
	                $('.submit-btn').html('Submit').removeAttr('disabled');
	                $('input').val('');
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                $('.submit-btn').val('Submit again');
	                $(form).append('Error, please try again.');
	            	$('input').val('');
	            }
	        })
		}
	});

	// submit contact form
	$("#contact-form").validate({
		rules: {email: {required: true, email: true}},
		messages: {email: "Please enter a valid email address"},
		submitHandler: function(form) {
	        $('.submit-success').remove();
	        $('.submit-btn').attr('disabled', 'disabled').html('<img style="height: 40px;" src="assets/img/loader-puff.svg">');
	        $.ajax({
	            type: 'post',
	            dataType: 'html',
	            url: 'assets/php/contact.php',
	            data: $(form).serialize(),
	            success: function (data) {
	                $('.submit-btn').before('<span class="submit-success"> ' + data + '</span>');
	                $('.submit-btn').html('Submit').removeAttr('disabled');
	                $('input').val('');
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                $('.submit-btn').val('Submit again');
	                $('.submit-btn').before(' Error');
	            	$('input').val('');
	            }
	        });
		}
	});

});
