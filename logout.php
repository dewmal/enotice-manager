<?php
session_start();

session_destroy(); //ends the current session
header("Location:index.php");
?>