<?php
require_once '../app.php';
/* @var $app Core\Application */
$app->checkLogin();

$userService = new Service\UserService($db);

// Delete user
if (isset($_GET['deluser'])) {
    $userId = $_GET['deluser'];
    $userService->removeUser($userId);
}


// Change Role - TODO validation
if (isset($_GET['changerole'])) {
    $userId = $_GET['changerole'];
    $roleId = $_GET['role_id'];

    // If the user has role admin than the change shoud be normal and vice versa
    if ($roleId === '1') {
        $roleId = '2';
    } else {
        $roleId = '1';
    }

    if ($userService->changeRole($userId, $roleId)) {
        header('Location: users.php');
        exit();
    }
}



if ($_SESSION['role_id'] === '2') {
    header('Location: ' . DIR);
    exit();
}
$app->loadTemplate('usersTemplate', $userService);
