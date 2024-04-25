<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include ("mathfunctions.php");
    ?>
    <h1>Factorial</h1>
    <?php 
        $num = 5;
        if (isPositiveInteger($num)){
            echo "<p>", $num, "! is", factorial($num), ".</p>";
        } else {
            echo "<p> Please enter a positive integer.</p>" ;
        }
        echo "<p> <a href='factorial.html'> Return to the Entry Page </a> </p>";
    ?>
</body>
</html>