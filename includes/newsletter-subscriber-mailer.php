<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
  // get post data
  $name = strip_tags( trim( $_POST['name'] ) );
  $email = filter_var( trim( $_POST['email'] ), FILTER_SANITIZE_EMAIL );
  $recipient = $_POST['recipient'];
  $subject = $_POST['subject'];


  if ( empty($name) || empty($email ) ){
    http_response_code(400);
    echo "Please fill out all fields.";
    exit;
  }

  // build email
  $message = "Name: $name\n";
  $message .= "Email: $email\n\n";

  // send email
  if ( mail($recipient, $subject, $message, $headers) ){
    http_response_code(200);
    echo "You are now subscribed";
  } else {
    http_response_code(500);
    echo "There was a problem";
  }

}
// else {
//   http_response_code(403);
//   echo "There was a problem";
// }
