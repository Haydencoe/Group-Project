<?php
session_start();
session_destroy();
//echo 'You have been logged out. <a href="/">Go back</a>';
header("location:/index.php"); //to redirect back to "index.php" after logging out
?>