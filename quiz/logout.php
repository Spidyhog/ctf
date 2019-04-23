<?php
require 'core.inc.php';
session_destroy();
$_SESSION['er_no']=NULL;
header('Location: ../index.php');
?>