<?php
$msg = "<p>Please <a href=\"donation2.html\">GO BACK</a> and fill in the following errors:</p>\n";
 
// Flag variable
$okay = true;
 
// Get form values
$fname      = trim($_POST['fname'] ?? '');
$lname      = trim($_POST['lname'] ?? '');
$email      = trim($_POST['email'] ?? '');
$amount_raw = trim($_POST['amount'] ?? '');
 
// Validate first name
if (empty($fname)) {
    $msg .= "<p>First name is required.</p>\n";
    $okay = false;
}
 
// Validate last name
if (empty($lname)) {
    $msg .= "<p>Last name is required.</p>\n";
    $okay = false;
}
 
// Validate email
if (empty($email)) {
    $msg .= "<p>Email address is required.</p>\n";
    $okay = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg .= "<p>Please enter a valid email address.</p>\n";
    $okay = false;
}
 
// Validate donation amount
if ($amount_raw === '') {
    $msg .= "<p>Donation amount is required.</p>\n";
    $okay = false;
} elseif (!is_numeric($amount_raw)) {
    $msg .= "<p>Donation amount must be a number.</p>\n";
    $okay = false;
} elseif ($amount_raw <= 0) {
    $msg .= "<p>Donation amount must be greater than zero.</p>\n";
    $okay = false;
}
 
if ($okay) {
    // Format the Donation Amount
    $formatted_amount = number_format((float) $amount_raw, 2);
 
    // Create the Confirmation Number
    $confirmation = strlen($lname) . strtoupper(substr($lname, 0, 1)) . random_int(1000, 9999);
 
    // Subscription status from the optional checkbox
    if (isset($_POST['subscription'])) {
        $subscription_status = 'no_subscription';
    } else {
        $subscription_status = 'subscription';
    }
 
    // Pick the subscription message
    switch ($subscription_status) {
        case 'no_subscription':
            $sub_msg = "You have chosen not to receive a free one-year subscription to our e-magazine.";
            break;
 
        case 'subscription':
            $sub_msg = "You will receive a free one-year subscription to our e-magazine.";
            break;
    }
 
    // Create the Donation Level
    if ($amount_raw >= 100) {
        $level = "Gold Supporter";
    } elseif ($amount_raw >= 50) {
        $level = "Silver Supporter";
    } elseif ($amount_raw >= 25) {
        $level = "Bronze Supporter";
    } else {
        $level = "Friend of the Animals";
    }
 
    // Repeated thank-you message
    $thanks = "";
    for ($i = 1; $i <= 3; $i++) {
        $thanks .= "Thank you! ";
    }
 
    // Escape user-entered values before displaying
    $safe_fname = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
    $safe_lname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
    $safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
 
    // Build success message
    $msg = "<p>Thank you $safe_fname $safe_lname for your donation of \$$formatted_amount.</p>\n";
    $msg .= "<p>Your confirmation number is $confirmation.</p>\n";
    $msg .= "<p>We will email your receipt to $safe_email.</p>\n";
    $msg .= "<p>$sub_msg</p>\n";
    $msg .= "<p>Your donation level is $level.</p>\n";
    $msg .= "<p>" . trim($thanks) . "</p>\n";
}
?>

<!DOCTYPE html>
<!-- Gerrick Baldevarona -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Confirmation</title>
</head>
<body>
    <?php echo $msg; ?>
</body>
</html>