<?php
  // STEP 1:
  require "libs/Services/Twilio.php"; // include Twilio library

  // STEP 2:
  // setup account SID and authentication token (taken from the twilio console)
  $accountSID = "ACdecbf09bb443ea8b43ab011a7f26dd92"; // your account SID
  $authToken = "a9acf75cc01030d6c053f36ed7d061cc"; // your authentication token

  // STEP 3:
  $client = new Services_Twilio($accountSID, $authToken); // create new twilio service (include acount sid and authentication token)

  // STEP 4:
  // setup data
  $people = array( // sample array data to pass to client
    "+601110849181" => "Nadzmi Idzham"
  );

  // STEP 5:
  // send message to clients
  foreach ($people as $phoneno => $name) {
    // send message to client
    $sms = $client->account->messages->sendMessage(
      "+17035960654", // your twilio phone no
      $phoneno, // your client phone no
      "Hi $name, apa khabar?", // your message to client sent by SMS
      array("https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png") // your image (if any) to send to client by MMS [nullable]
    )

    echo "Message was sent to $name"; // inform developer that the message has been sent to the specified $name
  }
?>
