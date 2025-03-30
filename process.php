<?php
include "3x+1.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["start"]) && isset($_GET["end"])) {
    $start = intval($_GET["start"]);
    $end = intval($_GET["end"]);
    
    $collatzHistogram = new CollatzHistogram();
    list($results, $histogram) = $collatzHistogram->collatz_with_range($start, $end);
    $collatzHistogram->print_results($results, $histogram, $start, $end);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collatz Range Calculator</title>
    <link rel="stylesheet" href="bluestyle.css">
</head>
<body>
    <h2>Type a range:</h2>
    <form method="get" action="process.php">
        <label for="start">Type starting number:</label>
        <input type="number" id="start" name="start" required><br><br>

        <label for="end">Type ending number:</label>
        <input type="number" id="end" name="end" required><br><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>
