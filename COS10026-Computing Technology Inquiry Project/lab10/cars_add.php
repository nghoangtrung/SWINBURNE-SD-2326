

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating web application - Lab 10</title>
</head>
<body>
<?php
    function sanitise_input($data){
        $data = trim($data);				
        $data = stripslashes($data);		
        $data = htmlspecialchars($data);	
        return $data;
    }

    if (isset($_POST["carmake"]) && isset($_POST["carmodel"]) && isset($_POST["price"]) && isset($_POST["yom"])) {
        $make = sanitise_input($_POST["carmake"]);
        $model = sanitise_input($_POST["carmodel"]);
        $price = sanitise_input($_POST["price"]);
        $yom = sanitise_input($_POST["yom"]);

        require_once("settings.php");
        $sql_table = "cars";
        $query = "INSERT INTO $sql_table (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo"<p> class=\"wrong\">Something wrong with", $query ,"</p>";
        } else {
            echo"<p class=\"ok\">Successfully added New Car record</p>";
        }
        mysqli_close($conn);
    } else {
        header("location :addcar.html");
    }
?>
</body>
</html>