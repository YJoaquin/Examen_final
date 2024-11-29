<?php
session_start();
session_destroy();
header("Location: paso10.php");
exit;
?>
