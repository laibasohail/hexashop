<?php 


session_start();
session_unset();
session_destroy();



header("location:http://localhost/HEXASHOP-1.0.0/admin/index.php");


?>