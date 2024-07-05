<?php
 
session_start();

 
$_SESSION = array();

 
session_destroy();

 
header("Location: Site/index.php");
exit;  
?>
