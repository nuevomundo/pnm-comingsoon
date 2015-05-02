$(document).ready(function () {

	// navi classes
	$('body.about nav.navbar li.about').addClass('active');

	// svg fallbacks
	svgeezy.init(false, 'png');

	// forms
	$('#newsletter-submit input, #contact-form input').on('focusout', function(){
		$('label.error').hide();
	});

	// lang switch
	var base_url= window.location.href.split('?')[0];
	var query = location.search;
	if (query == "") {
		$('.setlang li.en').addClass('active');
	}
	$('.setlang a').on('click', function(e) {
		e.preventDefault();
		window.location.href = base_url + '?lang=' + $(this).data('lang');
	});

	var initForms = function (jsonData) {

		// get json lang according to locale set in head
		if (locale == "en") {
			var submit_btn 	= jsonData.en.fields.submit;
			var required 	= jsonData.en.messages.required;
		    var email_req 	= jsonData.en.messages.email_required;
		    var error_msg 	= jsonData.en.messages.error_msg;
		    var error_btn 	= jsonData.en.messages.error_btn;
	    } else {
	    	var submit_btn 	= jsonData.es.fields.submit;
			var required 	= jsonData.es.messages.required;
		    var email_req 	= jsonData.es.messages.email_required;
		    var error_msg 	= jsonData.es.messages.error_msg;
		    var error_btn 	= jsonData.es.messages.error_btn;
	    }

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
		                $(form).append('<span class="submit-success"> ' + error_msg + '</span>');
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
		                $('.submit-btn').before('<span class="submit-success"> ' + error_msg + '</span>');
		            	$('input').val('');
		            }
		        });
			}
		});

	};

	// get forms json
	$.ajax({
      url:  "content/forms.json",
      success: initForms
 	});


});
