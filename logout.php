<?php
session_name('ArmaPanel');
session_start();
session_destroy();
header('location: index.php');
?>