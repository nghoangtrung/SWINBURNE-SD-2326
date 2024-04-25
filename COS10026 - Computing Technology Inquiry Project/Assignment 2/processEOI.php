<?php
    // redirect user to apply.php if this page is entered through a URL
    if (!isset($_POST["job_ref"])){
        header("Location: apply.php");
    }

    session_start();

    //Receive and validate csrf token passed through hidden input
    if (isset($_POST['csrf_token'])) {
            $csrfToken = $_POST['csrf_token'];
        } else {
            $csrfToken = '';
    }

    //Receive and validate, and decode the sync value passed through the HTTP header
    if (isset($_GET['sync_value'])) {
        $decodedValue = base64_decode($_GET['sync_value']);
        // Check if decoding was successful
        if ($decodedValue !== false) { 
            $syncValue = $decodedValue;
        } else {
            $syncValue = '';
        }
    } else {
        $syncValue = '';
    }  
      
    //Receive and validate sync token passed through hidden input
    if (isset($_POST['original_sync_value'])) {
        $decodedValue = base64_decode($_POST['original_sync_value']);
        // Check if decoding was successful
        if ($decodedValue !== false) { 
            $originalSyncValue = $decodedValue;
        } else {
            $originalSyncValue = '';
        }
    } else {
        $originalSyncValue = '';
    }

    // Validate CSRF token
    if (empty($csrfToken) || $csrfToken !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }

    // Validate synchronizer token
    if (empty($syncValue) || empty($originalSyncValue) || $syncValue !== $originalSyncValue) {
        die('Invalid synchronizer token');
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
    <title>EOI MinTecK</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <!-- MAIN -->
    <main id="processEOI-Main">
        <?php
            // Sanitise the inputs before assigning them to variables
            function sanitise_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            
            require_once("settings.php");
            if (!$conn) {
                echo "<p>Database connection failure</p>";
            }else{
        // Create the new EOI table if it does not exist
                $query = "CREATE TABLE IF NOT EXISTS EOI (
                    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                    Job_Reference_number VARCHAR(5),
                    First_name VARCHAR(255),
                    Last_name VARCHAR(255),
                    Date_of_Birth date,
                    Gender VARCHAR(255),
                    Street_address VARCHAR(255),
                    Suburb_town VARCHAR(255),
                    State VARCHAR(255),
                    Postcode INT(4),
                    Email_address VARCHAR(255),
                    Phone_number VARCHAR(255),
                    Bachelor VARCHAR(255),
                    English VARCHAR(255),
                    Teamwork VARCHAR(255),
                    Experience VARCHAR(255),
                    Presentation VARCHAR(255),
                    Other_skills TEXT,
                    Status ENUM('New', 'Current', 'Final') DEFAULT 'New'
                )";
                mysqli_query($conn, $query);

        // Check if the inputs are filled in and assign them to variables
                $sql_table = "EOI";
                if (!empty($_POST["Skill1"])){
                    $skill1 = $_POST["Skill1"];
                }else{
                    $skill1 = null;
                }
                if (!empty($_POST["Skill2"])){
                    $skill2 = $_POST["Skill2"];
                }else{
                    $skill2 = null;
                }
                if (!empty($_POST["Skill3"])){
                    $skill3 = $_POST["Skill3"];
                }else{
                    $skill3 = null;
                }
                if (!empty($_POST["Skill4"])){
                    $skill4 = $_POST["Skill4"];
                }else{
                    $skill4 = null;
                }
                if (!empty($_POST["Skill5"])){
                    $skill5 = $_POST["Skill5"];
                }else{
                    $skill5 = null;
                }
                if (!empty($_POST["other_skills"])){
                    $other_skills = $_POST["other_skills"];
                }else{
                    $other_skills = null;
                }
                // Each error adds a new <li> tag into the errMsg
                $errMsg = "<ul id=\"processEOI-List\">";

                // Job reference number: 5 alphanumeric chars
                if (!empty($_POST["job_ref"])){
                    $job_ref = $_POST["job_ref"];
                    $job_ref = sanitise_input($job_ref);
                    if (preg_match("/^[a-zA-Z0-9]{5}$/", $job_ref)){
                        if ($job_ref != "EN103" && $job_ref != "WD203"){
                            $errMsg.= "<li>Please enter the available job reference numbers (WD203 or EN103).</li>";
                        }
                    }else{
                        $errMsg .="<li>Job reference number must be 5 alphanumeric characters.</li>";
                    }
                }else{
                    $errMsg .="<li>Please enter your job reference number</li>";
                }

                // First name: max 20 alpha chars
                if (!empty($_POST["first_name"])){
                    $first_name = $_POST["first_name"];
                    $first_name = sanitise_input($first_name);
                    if (!preg_match("/^[a-zA-Z]{0,20}$/", $first_name)){
                        $errMsg .="<li>Your first name must consist of only alpha character, 20 characers at max.</li>";  
                    }
                }else{
                    $errMsg .="<li>Please enter your first name</li>";
                }

                // Last name: max 20 alpha chars
                if (!empty($_POST["last_name"])){
                    $last_name = $_POST["last_name"];
                    $last_name = sanitise_input($last_name);
                    if (!preg_match("/^[a-zA-Z]{0,20}$/", $last_name)){
                        $errMsg .="<li>Your last name must consist of only alpha character, 20 characers at max.</li>";  
                    }
                }else{
                    $errMsg .="<li>Please enter your last name</li>";
                }

                //Date of birth: dd/mm/yy; 15 < age < 80
                if (!empty($_POST["dob"])){
                    $dob = $_POST["dob"];
                    $dob = sanitise_input($dob);
                    if (preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $dob)){
                        list($day, $month, $year) = explode("/", $dob);
                        $today = date("d/m/Y");
                        list($this_day, $this_month, $this_year) = explode("/", $today);

                        // If it's February: 28 days for non-leap years, 29 days for leap years
                        if ($month == "02"){
                            if (!($day == "29" && ($year % 4 == 0))){
                                if (!($day > 28)){
                                    
                                    if (($this_year - $year < 15) || ($this_year - $year > 80)){
                                        $errMsg .= "<li>You must be 15 to 80 years old.</li>";
                                    }else{
                                        $dob = $year."-".$month."-".$day;
                                    }
                                }
                                else{
                                    $errMsg .= "<li>There are only 28 days in Feburary (29 for leap years).</li>";
                                }
                            }
                        }
                        // If it's April, June, September or November: 30 days
                        else if ($month == "04" || $month == "06" || $month == "09" || $month == "11"){
                            if ($day == "31"){
                                $errMsg .= "<li>There are only 30 days in April, June, September and November.</li>";
                            }
                            else{
                                if (($this_year - $year < 15) || ($this_year - $year > 80)){
                                    $errMsg .= "<li>You must be 15 to 80 years old.</li>";
                                }else{
                                    $dob = $year."-".$month."-".$day;
                                }
                            }
                        }
                        // Other months: 31 days (already validated in the regular expression)
                        else{
                            if (($this_year - $year < 15) || ($this_year - $year > 80)){
                                $errMsg .= "<li>You must be 15 to 80 years old.</li>";
                            }else{
                                $dob = $year."-".$month."-".$day;
                            }
                        }
                    // DoB does not match pattern    
                    }else{
                        $errMsg .="<li>Your date of birth must be in this format: dd/mm/yyyy.</li>";
                    }
                // DoB not entered    
                }else{
                    $errMsg .="<li>Please enter your date of birth.</li>";  
                }

                // Gender: selected
                if (!empty($_POST["Gender"])){
                    $gender = $_POST["Gender"];
                }else{
                    $errMsg .="<li>Please select a gender.</li>";
                }

                // Address: max 40 chars
                if (!empty($_POST["address"])){
                    $address = $_POST["address"];
                    $address = sanitise_input($address);
                    if (strlen($address) > 40){
                        $errMsg .="<li>Your street address must be at most 40 characters</li>";  
                    }
                }else{
                    $errMsg .="<li>Please enter your street address</li>";
                }

                // Suburb: max 40 chars
                if (!empty($_POST["suburb"])){
                    $suburb = $_POST["suburb"];
                    $suburb = sanitise_input($suburb);
                    if (strlen($suburb) > 40){
                        $errMsg .="<li>Your suburb address must be at most 40 characters</li>";  
                    }
                }else{
                    $errMsg .="<li>Please enter your suburb address</li>";
                }

                // State: selected
                if (!empty($_POST["state"])){
                    $state = $_POST["state"];
                }else{
                    $errMsg .="<li>Please select a state</li>";
                }

                // Each state must have corresponding postcodes
                // Postcodes: 4 digits
                if (!empty($_POST["postcode"])){
                    $postcode = $_POST["postcode"];
                    $postcode = sanitise_input($postcode);
                    if (!preg_match("/^\d{4}$/", $postcode)){
                        $errMsg .="<li>Your postcode must be exactly 4 digits.</li>";  
                    }
                    else if($state == "VIC"){
                        if ($postcode < 3000 ||$postcode > 3999){
                            $errMsg .="<li>Victoria's postcode must be in range: 3000 - 3999.</li>";  
                        }
                    }
                    else if($state == "NSW"){
                        if ($postcode < 2000 ||$postcode > 2999){
                            $errMsg .="<li>New South Wales's postcode must be in range: 2000 - 2999.</li>";  
                        }
                    }
                    else if($state == "QLD"){
                        if ($postcode < 4000 ||$postcode > 4999){
                            $errMsg .="<li>Queensland's postcode must be in range: 4000 - 4999.</li>";  
                        }
                    }
                    else if($state == "NT"){
                        if (!preg_match("/^08\d{2}$/", $postcode)){
                            $errMsg .="<li>Nothern Territory's postcode must be in range: 0800 - 0899.</li>";  
                        }
                    }
                    else if($state == "WA"){
                        if ($postcode < 6000 ||$postcode > 6797){
                            $errMsg .="<li>Western Australia's postcode must be in range: 6000 - 6797.</li>";  
                        }
                    }
                    else if($state == "SA"){
                        if ($postcode < 5000 ||$postcode > 5799){
                            $errMsg .="<li>South Australia's postcode must be in range: 5000 - 5799.</li>";  
                        }
                    }
                    else if($state == "TAS"){
                        if ($postcode < 7000 ||$postcode > 7799){
                            $errMsg .="<li>Tasmania's postcode must be in range: 7000 - 7799.</li>";  
                        }
                    }
                    else if($state == "ACT"){
                        if ($postcode < 2600 ||$postcode > 2920){
                            $errMsg .="<li>Australian Capital Territory's postcode must be in range: 2600 - 2920.</li>";  
                        }
                    }
                }else{
                    $errMsg .="<li>Please enter your postcode</li>";
                }

                // Email: validated format
                if (!empty($_POST["email"])){
                    $email = $_POST["email"];
                    $email = sanitise_input($email);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $errMsg .="<li>Please enter a valid email address.</li>";
                    }
                }else{
                    $errMsg .="<li>Please enter your email address.</li>";
                }

                //Phone number: 8 - 12 chars include spaces
                if (!empty($_POST["phone"])){
                    $phone = $_POST["phone"];
                    $phone = sanitise_input($phone);
                    if (!preg_match("/^[0-9 ]{8,12}$/", $phone)){
                        $errMsg .="<li>Phone number can only consists of digits and spaces, from 8 to 12 characters.</li>";
                    }
                }else{
                    $errMsg .="<li>Please enter your phone number</li>";
                }

        // Check whether the errMsg is empty: if yes -> print Errors; else -> print confirmation
                $errMsg .= "</ul>";
                //No errors in inputs, print comfirmation message, add EOI to table
                if ($errMsg == "<ul id=\"processEOI-List\"></ul>"){
                    $query = "insert into $sql_table (Job_Reference_number, First_name, Last_name, Date_of_Birth, Gender, Street_address, Suburb_town, State, Postcode, Email_address, Phone_number, Bachelor, English, Teamwork, Experience, Presentation, Other_skills)
                                           values ('$job_ref', '$first_name', '$last_name', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$other_skills')";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
                    }else{
                        $EOInumber = mysqli_insert_id($conn);
                        $confirmMsg = " 
                            <h1 id=\"processEOI-Title\">Application success</h1>

                            <div id=\"processEOI-Container\">
                                <div id=\"processEOI-Check-Sign-Container\">
                                    <img src=\"images/check-solid.svg\" alt=\"Exclamation mark\">
                                </div>
                                <p class=\"processEOI-Confirm-Text\">
                                    Hi ".$first_name. " ". $last_name. ". Welcome to minTeck.
                                </p>
                                <p class=\"processEOI-Confirm-Text\">
                                    It would be nice to have you with us. Your application has successfully been recorded and queued for process. We will reply to you in at most <em>14 days</em> through this email:<strong>".$email."</strong>
                                    Should you have any further questions, contact us and refer to your<strong>EOI number: ".$EOInumber."</strong>
                                </p>
                            </div>";
                        echo $confirmMsg;
                    }
                }
                //Errors present, print error messages and ask the candidate to fill in the form as instructed
                else {
                    $errMsg = "
                        <h1 id=\"processEOI-Title\">Be careful!</h1>
                        <div id=\"processEOI-Container\">
                            <div id=\"processEOI-Warning-Sign-Container\">
                                <img src=\"images/exclamation-red.svg\" alt=\"Exclamation mark\">
                            </div>
                            <p>
                                Please fill in the form according to the listed requirements:
                            </p>".$errMsg.
                            "<div id=\"processEOI-Back-Btn\">
                                <a href=\"apply.php\">Go back</a>
                            </div>
                        </div>";
                    echo "$errMsg";
                }
            }
        ?>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>