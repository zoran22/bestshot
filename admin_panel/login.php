<?php
require_once '../app.php';


if (isset($_POST['submit'])) {
    $userService = new \Service\UserService($db);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

    if (!$userService->loginAdmin($email, $password)) {
        throw new Exception('Wrong email or password!');
    }
    // Location to redirect after successful login
    // $_SESSION['user_id'] = $user->getId();
    header('Location: index.php');
    exit();
}

// if the user has an active session and has admin privileges redirect to Admin page
if (isset($_SESSION['user_id']) && $_SESSION['role_id'] === "1") {
    header('Location: index.php');
    exit();
}
//elseif (isset($_SESSION['user_id']) && $_SESSION['role_id'] === "2") {
//    header('Location: /');
//    exit();
//}

/* @var $app \Core\Application */
$app->loadTemplate('loginTemplate');
// It might be extended

