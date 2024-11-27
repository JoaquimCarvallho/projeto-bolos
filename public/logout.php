<?php
session_start();
session_destroy();
header('Location: /projeto-bolos/public/index.php');
exit;
?>
