<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $days= array ("Sunday", "Monday", "Tuesday",  "Wednesday", "Thursday", "Friday", "Saturday");
        echo "<p>The days of the week in English are:<br>
        $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6]</p>";
        $days= array ("Dimanche", "Lundi", "Mardi", "Mercedi", "Jeudi", "Vendredi", "Samedi");
        echo "<p>The days of the week in French are:<br>
        $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6]"
    ?>
</body>
</html>