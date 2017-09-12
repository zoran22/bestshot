<?php

/* @var $app Application */
require_once './app.php';

use Core\Application;
use Service\UserService;

if (isset($_GET['user_id'])) {
    $userService = new UserService($db);
    $data['user'] = $userService->getCurrentUser($_GET['user_id']);
} elseif (isset($_SESSION['user_id'])) {
	$userService = new UserService($db);

    $data['user'] = $userService->getCurrentUser($_SESSION['user_id']);
} else {
    header('Location: ' . DIR);
    exit();
}

$app->loadTemplate('profileTemplate', $data);
