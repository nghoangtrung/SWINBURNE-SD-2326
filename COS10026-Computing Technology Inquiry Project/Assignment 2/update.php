<?php 
// Sanistize input
function sanitise_input($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$errors ='';

if(!isset($_GET['EOIid'])) {
    header("location:manage.php");
}
$EOIid = $_GET["EOIid"];

require_once('settings.php');
$query = "SELECT * FROM EOI WHERE EOInumber='$EOIid'";
$result = mysqli_query($conn, $query);
$job = mysqli_fetch_assoc($result);
$Job_status = $job['Job_status'];

if (isset($_POST['Job_status'])) {
	$Job_status = sanitise_input($_POST['Job_status']);
	if (!$Job_status) {
		$errors .= '<p>New job status is required.</p>'; //Check if users have choose select or not.
	}
    // Start to update new value to table
	if (!$errors) {
        require_once("settings.php");
		$query = "UPDATE EOI SET Job_status ='$Job_status' WHERE EOInumber ='$EOIid'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			$errors .= 'Oops! Something went wrong. Please try again';
		} else {
			// navigate user back to manage.php
			header('Location: manage.php?message=Updated successfully.');
		}
	}
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
    <title>Manager Updating MinTecK</title>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.inc'; ?>
    <?php include 'includes/menu.inc'; ?>
    <main id="Update-Main">
        <h1>Update Job Status</h1>
    <!-------------- Select new value ------------------->
        <form action="" method="POST">
                <select name="Job_status" id="Update-Status">
                    <option value="">SELECT</option>
                    <option value="NEW">NEW</option>
                    <option value="CURRENT">CURRENT</option>
                    <option value="FINAL">FINAL</option>
                </select>
            <button type="submit" class="Update-Button-Save">Save</button>
        </form>
        <?php if ($errors): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errors; ?>
                </div>
		<?php endif; ?>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.inc'; ?>
</body>
</html>