

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
    <title>Management MinTecK</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main id="Manage-Main">
        <?php
            if(isset($_POST['display_all'])) {
                // Redirect to the same page to reset the search criteria
                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            }

            session_start();
            if (isset($_SESSION["Username"])) {
                echo "<br><h1 id='Manage-Title'>Welcome to Management Page</h1>";
            } else {
                header("location:enhancement1.php");
            }

            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { //It will automatically log out after 30mins
                // Unset all of the session variables
                $_SESSION = array();
                // Destroy the session
                session_destroy();
                header("location: enhancement1.php");
                exit;
            }
        
            // Update last activity time
            $_SESSION['LAST_ACTIVITY'] = time();

            function sanitise_input($data){
                $data = trim($data);				
                $data = stripslashes($data);		
                $data = htmlspecialchars($data);	
                return $data;
            }

            require_once("settings.php");	
            $query = "SELECT * FROM EOI";	

            if(isset($_POST["sName"])) {
                $fullName = sanitise_input($_POST["sName"]);
            
                // Check if there is a space in the input to determine if it's full name, last name, or first name only
                if (strpos($fullName, ' ') !== false) {
                    // Full name search
                    list($firstName, $lastName) = explode(" ", $fullName, 2); // Split full name into first and last name
                    $query = "SELECT * FROM EOI WHERE First_name = '$firstName' AND Last_name LIKE '%$lastName%'";
                } else {
                    // First name or last name search
                    $query = "SELECT * FROM EOI WHERE First_name LIKE '%$fullName%' OR Last_name LIKE '%$fullName%'";
                }
            }
            if (isset($_POST["sJob-Reference-Number"])) {
                $jobRefNum = $_POST["sJob-Reference-Number"];
                $query .= " WHERE Job_Reference_number LIKE '%$jobRefNum%'";
            }	
            // Query for sorting data
            if (isset($_POST["Manage-Sorting"])){
                $sortBy = $_POST["Manage-Sorting"];
                $sortOrder = $_POST["Manage-Sorting-Order"];
                $query .= " ORDER BY ". $sortBy . " " . $sortOrder;
            }

            $result = mysqli_query($conn, $query);
            $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_close($conn);
        ?>
        <section id="Manage-Table-Control">
            <h2 id="Manage-Skill-Title">Table Control</h2>
            <div id="Mange-Control-Container">
            <div id="Container-Group">
            <!----------- Log out Button ---------->
                <?php echo "<br><a href='logout.php' id='Logout-Button'>Log out</a>"; ?>
            <!----------- Display all data in the table ---------->
                <form action="<?php echo sanitise_input($_SERVER["PHP_SELF"]); ?>" method="post" id="Manage-Reset-Button">
                    <input type="submit" name="Display_All" value="Display All">
                </form>
            </div>
            <!----------- Search Form ---------->
            <div id="Manage-Search" class="Manage-Box">
                <h2>Search</h2>
                <form action="<?php echo sanitise_input($_SERVER["PHP_SELF"]); ?>" method="post" class="Manage-Form">
                    <label> Job Reference Number:
                        <select name="sJob-Reference-Number" id="sJob-Reference-Number">
                            <option value="">Select</option>
                            <option value="EN103">EN103 </option>
                            <option value="WD203">WD203 </option>
                        </select> 
                    </label>   
                    <input type="submit" class="Control-Button" value="Search"> 
                </form>           
                <form action="<?php echo sanitise_input($_SERVER["PHP_SELF"]); ?>" method="post" class="Manage-Form">
                    <label>Name: <input type="text" name="sName" id="Manage-Name"></label> 
                    <input type="submit" class="Control-Button" value="Search"> 
                </form>
            </div>
            <!----------- Delete Form ---------->
            <div id="Manage-Delete" class="Manage-Box">
                <h2>Delete</h2>
                <form action='delete.php' method='post' class='Manage-Form'>
                    <label> Job Reference Number:
                        <select name='dJob-Reference-Number' id='dJob-Reference-Number'>
                            <option value=''>Select</option>
                            <option value='EN103'>EN103 </option>
                            <option value='WD203'>WD203 </option>
                        </select> 
                    </label>   
                    <input type='submit' class="Control-Button" value='Delete'> 
                </form>     
            </div>
            <!----------- Sorting Form - Enhancement 2 ---------->
            <div id="Manage-Section-Sort" class="Manage-Box">
                <h2>Sort table</h2>
                <form action="<?php echo sanitise_input($_SERVER["PHP_SELF"]); ?>" method="post" class="Manage-Form" id="Manage-Sort-Form">
                    <label> Sort table by
                        <select name="Manage-Sorting" id="Manage-Sorting">
                            <option value="">Field</option>
                            <option value="EOInumber">EOI number</option>
                            <option value="Job_Reference_number">Job reference number</option>
                            <option value="First_name">First name</option>
                            <option value="Last_name">Last name</option>
                            <option value="Date_of_Birth">Date of Birth</option>
                            <option value="Gender">Gender</option>
                            <option value="Street_address">Street address</option>
                            <option value="Suburb_Town">Suburb/Town</option>
                            <option value="State">State</option>
                            <option value="Postcode">Postcode</option>
                            <option value="Email_address">Email address</option>
                            <option value="Phone_Number">Phone number</option>
                            <option value="Job_status">Status</option>
                        </select>
                    </label>
                    <label for="Manage-Sorting-Order">Order
                        <select name="Manage-Sorting-Order" id="Manage-Sorting-Order">
                            <option value="ASC">Ascending</option>
                            <option value="DESC">Descending</option>
                        </select>
                    </label>
                    <input type="submit" class="Control-Button" value="Sort">
                </form>
            </div>
            </div>
        </section>
        <!----------- Button to display skill ---------->
        <!-- We use this becausr we found the table contains too many data so users can use this to show main data -->
        <section id="Manage-Section-Table">
            <input type="checkbox" name="Skill-Bachelor" class="Manage-Skills" id="Manage-Skills-Bachelor" >
            <input type="checkbox" name="Skill-English" class="Manage-Skills" id="Manage-Skills-English" >
            <input type="checkbox" name="Skill-Teamwork" class="Manage-Skills" id="Manage-Skills-Teamwork" > 
            <input type="checkbox" name="Skill-Experience" class="Manage-Skills" id="Manage-Skills-Experience" >
            <input type="checkbox" name="Skill-Presentation" class="Manage-Skills" id="Manage-Skills-Presentation" >
            <input type="checkbox" name="Skill-Other" class="Manage-Skills" id="Manage-Skills-Other" >
        <div id="Manage-Skill-Display">
            <h2>Skill Display</h2>
            <div id="Manage-Skill-Display-Container">
            <label for="Manage-Skills-Bachelor" id="Label-Bachelor">Bachelor</label>
            <label for="Manage-Skills-English" id="Label-English">English</label>
            <label for="Manage-Skills-Teamwork" id="Label-Teamwork">Teamwork</label>
            <label for="Manage-Skills-Experience" id="Label-Experience">Experience</label>
            <label for="Manage-Skills-Presentation" id="Label-Presentation">Presentation</label>        
            <label for="Manage-Skills-Other" id="Label-Other">Other</label>   
            </div>
        </div>
        <!----------- Display Table ---------->
        <table>
            <thead>
                <tr>
                    <th scope='col'>EOI Number</th>
                    <th scope='col'>Job Reference Number</th>
                    <th scope='col'>Fisrt Name</th>
                    <th scope='col'>Last Name</th>
                    <th scope='col'>Date of Birth</th>
                    <th scope='col'>Gender</th>
                    <th scope='col'>Street Address</th>
                    <th scope='col'>Suburb Town</th>
                    <th scope='col'>State</th>
                    <th scope='col'>Postcode</th>
                    <th scope='col'>Email Address</th>
                    <th scope='col'>Phone Number</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Update Status</th>
                    <th scope='col' class="Col-Bachelor">Bachelor</th>
                    <th scope='col' class="Col-English">English</th>
                    <th scope='col' class="Col-Teamwork">Teamwork</th>
                    <th scope='col' class="Col-Experience">Experience</th>
                    <th scope='col' class="Col-Presentation">Presentation</th>
                    <th scope='col' class="Col-Other">Other Skills</th>
                </tr>              
            </thead>
            <tbody>
                <?php foreach($members as $member): ?>
                    <tr>
                        <td>
                            <?php echo $member['EOInumber']; ?>
                        </td>
                        <td>
                            <?php echo $member['Job_Reference_number']; ?>
                        </td>
                        <td>
                            <?php echo $member['First_name']; ?>
                        </td>
                        <td>
                            <?php echo $member['Last_name']; ?>
                        </td>
                        <td>
                            <?php echo $member['Date_of_Birth']; ?>
                        </td>
                        <td>
                            <?php echo $member['Gender']; ?>
                        </td>
                        <td>
                            <?php echo $member['Street_address']; ?>
                        </td>
                        <td>
                            <?php echo $member['Suburb_town']; ?>
                        </td>
                        <td>
                            <?php echo $member['State']; ?>
                        </td>
                        <td>
                            <?php echo $member['Postcode']; ?>
                        </td>
                        <td>
                            <?php echo $member['Email_address']; ?>
                        </td>
                        <td>
                            <?php echo $member['Phone_number']; ?>
                        </td>
                        <td>
                            <?php echo $member['Job_status']; ?>
                        </td>
                        <td>
                            <?php echo "<a href='update.php?EOIid=" . $member['EOInumber'] . "' class='Update-Button'>Update</a>"; ?>
                        </td>
                        <td class="Col-Bachelor">
                            <?php echo $member['Bachelor']; ?>
                        </td>
                        <td class="Col-English">
                            <?php echo $member['English']; ?>
                        </td>
                        <td class="Col-Teamwork">
                            <?php echo $member['Teamwork']; ?>
                        </td>
                        <td class="Col-Experience">
                            <?php echo $member['Experience']; ?>
                        </td>
                        <td class="Col-Presentation">
                            <?php echo $member['Presentation']; ?>
                        </td>
                        <td class="Col-Other">
                            <?php echo $member['Other_skills']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>