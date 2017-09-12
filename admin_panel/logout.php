<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_destroy();
/* @var $app Application */
header('Location: ../index.php');
exit();