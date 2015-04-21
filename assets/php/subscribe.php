<?php

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
		echo "Thanks for subscribing, please check your inbox to confirm!";	
		//print_r($result);

} else {
  echo "Please enter a valid email address.";
}

function isValidEmail($email) {
return filter_var($email, FILTER_VALIDATE_EMAIL)
    && preg_match('/@.+\./', $email);
}

