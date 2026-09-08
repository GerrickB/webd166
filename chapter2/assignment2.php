<?php 
// php variables
$heading = "Googleplex";
$street = "1600 Amphitheatre Parkway";
$city = "Mountain View";
$state = "CA";
$country = "United States";
?>

<!DOCTYPE html>
<!-- Name: Gerrick Baldevarona -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables Gerrick Baldevarona</title>
</head>
<body>
<?php

// prints the address
print "
<header>
    <h1>$heading</h1>
</header>

<p>The $heading is the corporate headquarters complex of Google 
and its parent company Alphabet Inc. It is located at: 
<br>
$street
<br>
$city, $state, $country
</p>";

?>
    
</body>
</html>
