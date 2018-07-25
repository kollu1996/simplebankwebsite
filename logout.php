<?php   
session_start(); 
session_destroy(); 
header("location:/second.html"); 
exit();
?>
