<?php

require_once '../../vendor_php_composer/vendor/autoload.php'; // Replace with the actual path to your autoload file

use Twilio\Rest\Client;


$sid    = "ACf06d5e3a23cce5edf889c68905bd95b8";
$token  = "7167681496e6888c8a74b6c788dccf51";
$twilio = new Client($sid, $token);

$message = $twilio->messages
  ->create("+639055108549",
    array(
              "from" => "+12545276368",
              "body" => "Sample Message"
    )
  );
echo 'Message SID: ' . $message->sid;