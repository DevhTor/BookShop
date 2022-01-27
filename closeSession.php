<?php

SESSION_START();
session_destroy();


header('location: ' .  '//' .$_SERVER['SERVER_NAME'] . '/BookShop/index.php');

?>