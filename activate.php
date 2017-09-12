<?php
require_once './app.php';

use Service\UserService;
 $userService = new UserService($db);
if ($userService->emailActivate()) {
 header('Location: login.php?action=active');
        exit();
}
$app->loadTemplate('loginTemplate');