<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <?php 
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <?php 

        if(isset($_POST["firstname"])) {
            $firstname = $_POST["firstname"]; 
            $firstname = sanitise_input($firstname);
        }
        else {
            $hasError = true;
        }

        if(isset($_POST["lastname"])) {
            $lastname = $_POST["lastname"]; 
            $lastname = sanitise_input($lastname);        
        }
        else {
            header("location: register.html");
        }

        if(isset($_POST["age"])) {
            $age = $_POST["age"];
            $age = sanitise_input($age);
        }
        else {
            header("location: register.html");
        }

        if(isset($_POST["food"])) {
            $food = $_POST["food"];
            $food = sanitise_input($food);
        }
        else {
            header("location: register.html");
        }

        if(isset($_POST["partySize"])) {
            $partySize = $_POST["partySize"];
            $partySize = sanitise_input($partySize);
        }
        else {
            header("location: register.html");
        }

        if(isset($_POST["species"])) {
            $species = $_POST["species"];
            $species = sanitise_input($species);
        }
        else {
            header("location: register.html");
        }

        $tour = "";
        if (isset($_POST["1day"]) || isset($_POST["4day"]) || isset($_POST["10day"])) {
            if(isset($_POST["1day"])) {
                $tour .= "One-day tour";
                if(isset($_POST["4day"]) && isset($_POST["10day"])) {
                    $tour .= ", ";
                }
                else if (isset($_POST["4day"]) || isset($_POST["10day"])) {
                    $tour .= " and ";
                }
                
            }
            if(isset($_POST["4day"])) {
                $tour = $tour. "Four-day tour";
                if(isset($_POST["10day"])) {
                    $tour .= " and ";
                }
            }   
            if (isset($_POST["10day"])) {
                $tour .= "Ten-day tour";
            } 
        }  
        else {
            header("location: register.html");
        }

        $errMsg = "";

        if ($firstname == "") {
            $errMsg .= "<p>You must enter your first name.</p>";
        }
        else if (!preg_match("/[a-zA-Z]*$/", $firstname)) {
            $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
        }

        if ($lastname == "") {
            $errMsg .= "<p>You must enter your last name.</p>";
        }
        else if (!preg_match("/^[a-zA-Z\-]*$/", $lastname)) {
            $errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
        }

        if ($age == "") {
            $errMsg .= "<p>You must enter your age.</p>";
        }
        else if (!is_numeric($age) || $age <= 10 || $age >= 10000) {
            $errMsg .= "<p>Your age must between 10 and 10000.</p>";
        }

        if ($errMsg != "") {
            echo "<p>$errMsg</p>";
        }
        else {
            echo "<p>Welcome $firstname $lastname! <br>
                You are now booked on the $tour.<br>
                Species: $species<br>
                Age: $age<br>
                Meal Preference: $food<br>
                Number of travelers: $partySize<br>";
        }       
    ?>
</body>
</html>