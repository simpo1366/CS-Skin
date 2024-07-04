<?php

session_start();

$_SESSION = array();

session_destroy();

header("location:../Jesse's work/index.php");