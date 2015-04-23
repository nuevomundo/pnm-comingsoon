<?php
    // get json for error messages
    include('../../config.php')

	if (isset($_POST["email"]) && $_POST["email"] != "" && isValidEmail($_POST["email"]) ) {

	        $firstname = trim($_POST["firstname"]);
	        $lastname = trim($_POST["lastname"]);
	        $email = trim($_POST["email"]);

			include('chimpkey.php');
			require 'mailchimp-api/MailChimp.php';
			$MailChimp = new \Drewm\MailChimp($chimpkey);
			$result = $MailChimp->call('lists/subscribe', array(
			                'id'                => $listid,
			                'email'             => array('email'=>$email),
			                'merge_vars'        => array('FNAME'=>$firstname, 'LNAME'=>$lastname),
			                'double_optin'      => true,
			                'update_existing'   => true,
			                'replace_interests' => false,
			                'send_welcome'      => false,
			            ));

			echo $forms['messages']['subscribe_success'];
			//print_r($result);

	} else {
      echo $forms['messages']['email_required'];
	}

	function isValidEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL)
	    && preg_match('/@.+\./', $email);
	}

