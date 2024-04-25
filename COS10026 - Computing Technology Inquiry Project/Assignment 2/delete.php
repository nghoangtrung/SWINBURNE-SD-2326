<?php
    if(!isset($_POST['dJob-Reference-Number'])) {
        header("location: manage.php");
    }
    $jobNumRef = $_POST['dJob-Reference-Number'];
    require_once('settings.php');
    $query = "DELETE FROM EOI WHERE Job_Reference_number = '$jobNumRef'";
    $result = mysqli_query($conn, $query);
    if($result) {
        header("location: manage.php?message='Delete successfully'");
        exit;
    } else {
        echo "<p>Error</p>";
    }

    mysqli_close($conn);
?>