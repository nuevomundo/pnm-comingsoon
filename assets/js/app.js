$(document).ready(function () {

	// get forms json
	var jsonData = $.parseJSON($.ajax({
        url:  "content/forms.json",
        async: false
    }).responseText);

	var submit_btn = jsonData.fields.submit;
	var required = jsonData.messages.required;
    var email_req = jsonData.messages.email_required;
    var error_msg = jsonData.messages.error_msg;
    var error_btn = jsonData.messages.error_btn;
    //console.log(email_req);

	// navi classes
	$('body.about nav.navbar li.about').addClass('active');

	// svg fallbacks
	svgeezy.init(false, 'png');

	// forms
	$('#newsletter-submit input, #contact-form input').on('focusout', function(){
		$('label.error').hide();
	});

	// submit newsletter
	$("#newsletter-submit").validate({
		rules: {email: {required: true, email: true}},
		messages: {
			firstname: required,
			lastname: required,
			email: email_req
		},
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
	                $('.submit-btn').html(submit_btn).removeAttr('disabled');
	                $('input').val('');
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                $('.submit-btn').val(error_btn);
	                $(form).append(error_msg);
	            	$('input').val('');
	            }
	        })
		}
	});

	// submit contact form
	$("#contact-form").validate({
		rules: {email: {required: true, email: true}},
		messages: {
			firstname: required,
			lastname: required,
			email: email_req,
			message: required,
			reason_interested: required
		},
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
	                $('.submit-btn').html(submit_btn).removeAttr('disabled');
	                $('input').val('');
	            },
	            error: function (xhr, ajaxOptions, thrownError) {
	                $('.submit-btn').val(error_btn);
	                $('.submit-btn').before(error_msg);
	            	$('input').val('');
	            }
	        });
		}
	});

});
