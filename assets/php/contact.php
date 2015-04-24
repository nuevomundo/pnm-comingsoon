<?php
    // Application date
    date_default_timezone_set('Etc/UTC');

    // get json for error messages
    include('../../config.php');

    if (isset($_POST["email"]) && $_POST["email"] != "" && isValidEmail($_POST["email"]) ) {

        require 'phpmailer/PHPMailerAutoload.php';
        include 'auth.php';

        // Applicant Personal Data
        $firstname = trim($_POST["firstname"]);
        $lastname = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $reason = trim($_POST["reason_interested"]);
        $message = trim($_POST["message"]);
        $ip = $_SERVER['REMOTE_ADDR'];

        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging: 0 = off (for production use), 1 = client messages, 2 = client and server messages
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->IsHTML(true);
        $mail->Host = $mail_host;
        $mail->Port = $mail_port;
        $mail->SMTPSecure = $mail_ssl;
        $mail->SMTPAuth = true;
        $mail->Username = $mail_user;
        $mail->Password = $mail_pass;

        // send email
        $mail->SetFrom($email);
        $mail->addAddress($sendto);
        $mail->Subject = 'PNM Form submitted by ' . $firstname . ' ' . $lastname . ' (' . $email . ')';
        $mail->Body = '<p><strong>Sent from</strong> ' . $firstname . ' ' . $lastname . '<br />';
        $mail->Body .= '<strong>Email:</strong> ' . $email . '</p>';
        $mail->Body .= '<p><strong>Reason for interest:</strong> ' . $reason . '<br />';
        $mail->Body .= '<strong>Message:</strong> ' . $message . '</p>';
        $mail->Body .= '<p>Sent from ' . $ip . ' / </p>';

        //send confirmation email, check for errors
        if (!$mail->send()) {
            echo $forms['messages']['error'] . ' ' . $mail->ErrorInfo;
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
        //echo "<pre>"; print_r($resp); echo "</pre>";

        curl_close($curl);

    } else {
      echo $forms['messages']['email_required'];
    }

    function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL)
        && preg_match('/@.+\./', $email);
    }
?>