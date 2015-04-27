<?php

    if (isset($_POST["email"]) && $_POST["email"] != "" && isValidEmail($_POST["email"]) ) {

        // get json for error messages
        include('../../config.php');
        include('auth.php');

        // Applicant Personal Data
        $firstname = trim($_POST["firstname"]);
        $lastname = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $reason = trim($_POST["reason_interested"]);
        $message = trim($_POST["message"]);

        $subject = 'PNM Form submitted by ' . $firstname . ' ' . $lastname . ' (' . $email . ')';
        $content = '<p><strong>Sent from</strong> ' . $firstname . ' ' . $lastname . '<br />';
        $content .= '<strong>Email:</strong> ' . $email . '</p>';
        $content .= '<p><strong>Reason for interest:</strong> ' . $reason . '<br />';
        $content .= '<strong>Message:</strong> ' . $message . '</p>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . $email . "\r\n";
        $headers .= 'Reply-To: ' . $email . "\r\n";

        if (!mail($sendto, $subject, $content, $headers)) {
            echo $forms['messages']['error_msg'] . ' ' . error_get_last();
        } else {
            echo $forms['messages']['send_success'];
        }

        // submit to bitrix
        $bitrix_dataset = array(
             'LOGIN' => $bitrix_user,
             'PASSWORD' => $bitrix_pass,
             'TITLE' => rawurlencode($firstname . ' ' . $lastname),
             'SOURCE_DESCRIPTION' => rawurlencode($reason),
             'EMAIL_HOME' => $email,
             'NAME' => urlencode($firstname),
             'LAST_NAME' => urlencode($lastname),
             'COMMENTS' => rawurlencode($message),
             'STATUS_ID' => 'NEW',
             'OPENED' => 'Y',
             'SOURCE_ID' => 'EMAIL'
        );

        $query = http_build_query($bitrix_dataset);
        // $url = 'http://pnm.bitrix24.com/crm/configs/import/lead.php?' . urldecode($query);
        // echo "<pre>"; print_r($url); echo "</pre>";

        // use curl to send httprequest
        $curl = curl_init();
        // set options
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://pnm.bitrix24.com/crm/configs/import/lead.php',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => urldecode($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTREDIR => 1
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // echo "<pre>"; print_r($resp); echo "</pre>";

        curl_close($curl);

    } else {
      echo $forms['messages']['email_required'];
    }

    function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL)
        && preg_match('/@.+\./', $email);
    }
?>