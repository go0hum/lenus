<?php 
include_once 'core/config.php';

session_destroy();

header('Location: signin.php'); 
