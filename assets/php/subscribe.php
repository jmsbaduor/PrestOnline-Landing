<?php

	// Put your MailChimp API and List ID hehe
	$api_key = '7d23f5408aef39aec2cd3139b1dd2adf-us20';
	$list_id = '149e1416f9';

	// Let's start by including the MailChimp API wrapper
	include('MailChimp.php');
	// Then call/use the class
	use \DrewM\MailChimp\MailChimp;
	$MailChimp = new MailChimp($api_key);

	// Submit subscriber data to MailChimp
	// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
	// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
	$result = $MailChimp->post("lists/$list_id/members", [
							'email_address' => $_POST["email"],
							'status'        => 'subscribed',
						]);

	if ($MailChimp->success()) {
		// Success message
		echo "<h4>Thank you for your request and interest in our product.</h4>";
	} else {
		// Display error
		echo $MailChimp->getLastError();
		// Alternatively you can use a generic error message like:
		// echo "<h4>Please try again.</h4>";
	}
?>
