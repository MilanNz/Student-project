<?php

session_start();
$_SESSION = array();
die(header('Location: reg_log.html'));
