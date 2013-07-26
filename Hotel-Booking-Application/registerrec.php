<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Insert a Course Record</title>
<link rel="stylesheet" type = "text/css" href="styles/mycss.css"/>
</head>
<body>
<?php require_once 'inc/header.inc.htm';
	$errors = array(); // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['first_name']);
	}

	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = trim($_POST['last_name']);
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = trim($_POST['email']);
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...

		require_once ('./db3.inc.php'); // Connect to the db.
$priv  = $_POST['priv'];
		// Make the query:
		$q = "INSERT INTO users (first_name, last_name, email, privilege, pass, registration_date) VALUES ('$fn', '$ln', '$e', '$priv', SHA1('$p'), NOW() )";
		$r = @mysqli_query ($link, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered!</p><p><br /></p>';

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($link) . '<br /><br />Query: ' . $q . '</p>';
          }
		  }else { // Report the errors.

		 		echo '<h1>Error!</h1>
		 		<p class="error">The following error(s) occurred:<br />';
		 		foreach ($errors as $msg) { // Print each error.
		 			echo " - $msg<br />\n";
		 		}
		 		echo '</p><p>Please try again.</p><p><br /></p>';

	} // End of if (empty($errors)) IF.

?>
  <p><a href = "index.php">Return to Log in page</a></p>


</body></html>
