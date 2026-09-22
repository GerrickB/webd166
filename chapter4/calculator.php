<?php
// Retrieve values from the form.
$milesDriven = $_POST["miles_driven"];
// Calculate miles per gallon.
$gallonsUsed = $_POST["gallons_used"];
// Calculate the cost of the trip.
$priceGallon = $_POST["price_gallon"];

// Math calculations
$mpg = $milesDriven / $gallonsUsed;
// the total cost of the trip.
$totalCost = $gallonsUsed * $priceGallon
?>

<!DOCTYPE html>
<!-- Gerrick Baldevarona -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Calculator Results</title>
</head>
<body>
    <header>
        <h1>Trip Calculations</h1>
    </header>

    <section>
        <h2>Values Entered</h2>
        <p>Miles Driven: <?php echo number_format($milesDriven) ?></p>
        <p>Gallons Used: <?php echo $gallonsUsed ?></p>
        <p>Price per Gallon: <?php echo "$" . number_format($priceGallon, 2) ?></p>

        <h2>Your Results</h2>
        <p>Miles Per Gallon: <?php echo number_format($mpg, 2) ?></p>
        <p>Cost of the Trip: <?php echo "$" . number_format($totalCost, 2) ?></p>
    </section>
</body>
</html>