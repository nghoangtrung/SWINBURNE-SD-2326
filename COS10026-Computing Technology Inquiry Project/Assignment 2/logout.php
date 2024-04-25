<?php
    session_start();
    $_SESSION = array(); // unset Session
    if(session_destroy()){
        header("location: enhancement1.php");
    }
?>
