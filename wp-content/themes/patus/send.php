<?php 

define( "RECIPIENT_EMAIL", $_GET['admin_email'] );
define( "EMAIL_SUBJECT", $_GET['subject']);
 
// Read the form values
$success = false;
$senderName = isset( $_GET['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_GET['name'] ) : "";
$senderWebsite = isset( $_GET['website'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_GET['website'] ) : "";
$senderEmail = isset( $_GET['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_GET['email'] ) : "";
$message = isset( $_GET['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_GET['message'] ) : "";
$message .= ' - '. $senderWebsite;
 
// If all values exist, send the email
if ( $senderName && $senderEmail && $message ) {
  $recipient = $senderName . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
}
 
// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
	
	if($_GET["ajax"] == 'true') {
		echo 'success';
	} else {
		echo 'error';
	}

} else {
?>
<html>
  <head>
    <title>Thanks!</title>
  </head>
  <body>
    </body>
</html>
<?php
}
?>