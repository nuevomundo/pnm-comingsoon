# NuMundo
=============

Temporary NuMundo landing page with basic JSON backend

Installation
------------

* Run `npm install`
* Run `grunt sass` to compile sass to css
* Run `grunt cssmin` to generate the minified css file
* For development run `grunt watch` or `grunt` to check for modifications in sass files, concatenate vendor files (css / js) and minify app.js

For email / bitrix submission define assets/php/auth.php

* $sendto (Email contact form will be submitted to)
* $mail_host
* $mail_port
* $mail_ssl
* $mail_user
* $mail_pass
* $bitrix_user
* $bitrix_pass

For mailchimp submission define assets/php/chimpkey.php

* $chimpkey (Mailchimp API Key)
* $listid (List ID)