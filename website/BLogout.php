<?php
session_start();
session_destroy();
header('location:BLogin.php?doit=logout');

?>