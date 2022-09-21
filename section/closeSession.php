<?php

SESSION_START();
session_destroy();

include("../config/server.php");

header('location: ' . $urlServer);
