<?php
require_once './app.php';

if (isset($_POST['submit'])) {
    $userService = new \Service\UserService($db);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    if (!$userService->login($email, $password)) {
        $_SESSION['error'] = 'Грешен имейл или парола!';
        header('Location: login.php');
        exit();
    }
    // Location to redirect after successful login
    // $_SESSION['user_id'] = $user->getId();
    header('Location: index.php');
    exit();
}

/* @var $app \Core\Application */
$app->loadTemplate('loginTemplate');
