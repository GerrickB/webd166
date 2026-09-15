<?php

// data stored in variables
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$heard = $_POST['heard'];
$comments = $_POST['comments'];
?>

<!DOCTYPE html>
<!-- Gerrick Baldevarona -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Results Gerrick Baldevarona</title>
    
</head>
<body>
    <h1>Form Results</h1>

    <h2>You submitted the below information</h2>
    <p>Name: <?php print $name ?></p>
    <p>Email: <?php print $email ?></p>
</body>
</html>