<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <label for="Register-Username"> Username
                <input type="text" name="Username" id="Register-Username">
            </label>
            <label for="Register-Password"> Password
                <input type="text" name="Password" id="Register-Password">
            </label>
            <input type="submit" name="submit" value="Register">
        </form>
    </main>

    <?php
    if(isset($_POST['submit'])) {
        // Process form submission
        require_once('settings.php');

        function sanitise_input($data){
            $data = trim($data);              
            $data = stripslashes($data);        
            $data = htmlspecialchars($data);    
            return $data;
        }
        
        $password = sanitise_input($_POST['Password']);
        $username = sanitise_input($_POST['Username']);
        
        // Generate a random salt value
        function generate_salt() {
            return uniqid(mt_rand(), true); // Generates a unique ID based on the current time in microseconds
        }

        $salt = generate_salt();
        $hashed_password = hash('sha256', $password . $salt); // Use SHA-256 hashing algorithm

        // Prepare SQL statement with sanitized input
        $insert_query = "INSERT INTO Manager (Username, Pwd, Salt) VALUES ('$username', '$hashed_password', '$salt')";
        
        // Execute query
        $result = mysqli_query($conn, $insert_query);

        if($result) {
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
</body>
</html>
