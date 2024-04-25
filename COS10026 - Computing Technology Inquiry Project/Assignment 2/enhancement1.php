<!-- Please us this account to log in - Username: manager Password:InquiryManager2024 -->
<?php
session_start();
function sanitise_input($data){
    $data = trim($data);                
    $data = stripslashes($data);        
    $data = htmlspecialchars($data);    
    return $data;
}

if (!isset($_SESSION['disableForm'])) {
    $_SESSION['disableForm'] = false;
}
// Function to check login credentials
require_once('settings.php');

$errorMsg = '';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = sanitise_input($_POST['Username']);
    $password = sanitise_input($_POST['Password']);

    $stmt = mysqli_prepare($conn, "SELECT * FROM Manager WHERE Username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    // Check login attempts
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 1;
        $_SESSION['last_attempt_time'] = time();
    }

    // Limit login attempts
    $max_attempts = 2;
    $time_limit = 10; // 10 seconds
    if ($_SESSION['login_attempts'] < $max_attempts) {
        $_SESSION['disableForm'] = false;
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $store_hashedPwd = $user['Pwd'];
            $salt = $user['Salt'];

            $hashedPwd = hash('sha256', $password . $salt); //hash input password

            if ( $hashedPwd === $store_hashedPwd) {
            // Successful login
            // Reset login attempts
            $_SESSION["Username"] = $user['Username'];
            $_SESSION["Pwd"] = $user['Pwd'];

            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = time();
            // Redirect to dashboard or desired page
            header("Location: manage.php");
            exit();
            } else {
                if (empty($user['Username']) || empty( $user['Pwd'])) {
                    $errorMsg .= "Please enter both username and password.";
                }else {
                    $_SESSION['login_attempts']++;
                    $remaining_attempts = $max_attempts - $_SESSION['login_attempts']  + 1;
                    $errorMsg .= "Invalid username or password. $remaining_attempts attempts remaining.";
                    $_SESSION['last_attempt_time'] = time();
                }              
            }
        } else {
            if (empty($username) || empty($password)) {
                $errorMsg .= "Please enter both username and password.";
            } else {
                // Invalid credentials
                $_SESSION['login_attempts']++;
                $remaining_attempts = $max_attempts - $_SESSION['login_attempts'] + 1;
                $errorMsg .= "Invalid username or password. $remaining_attempts attempts remaining.";
                $_SESSION['last_attempt_time'] = time();
            }
        }
    } else {
        // Check if time limit has elapsed
        if (time() - $_SESSION['last_attempt_time'] > $time_limit) {
            // Reset login attempts
            $_SESSION['disableForm'] = false;
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = time();
        } else {
            // Too many login attempts
            $_SESSION['disableForm'] = true;
            $errorMsg .= "Too many login attempts. Please try again after 10s.";
        }
    }
}

if( isset($_SESSION["Username"]) && isset($_SESSION["Pwd"])) {
    header('location: manage.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/responsive.css" rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://kit.fontawesome.com/97645aa929.js">    
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/97645aa929.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <title>Log In MinTecK</title>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main id="Login-Main">
        <section id="Login-Section">
            <h1>Login</h1>
            <p>Welcome to MinTecK</p>
            <form action="#" method="post" id="Login-Form">
                <label for="Login-Username">Username</label>
                <input type="text" name="Username" id="Login-Username" placeholder="Your username" <?php if ($_SESSION['disableForm']) echo 'disabled' ?>>
                <label for="Login-Password">Password</label>
                <input type="password" name="Password" id="Login-Password" placeholder="Your password" <?php if ($_SESSION['disableForm']) echo 'disabled' ?>>
                <input type="submit" id="Login-Button" name="Login" value="Login" <?php if ($_SESSION['disableForm']) echo 'disabled' ?>>
                <?php echo "<p class='Login-Alert'>$errorMsg</p>" ?>
            </form>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>
