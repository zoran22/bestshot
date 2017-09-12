<?php
require_once './app.php';

if (isset($_POST['change_pass'])) {
    $user = new \Service\UserService($db);
    $oldPass = filter_input(INPUT_POST, 'oldPass', FILTER_DEFAULT);
    $newPass = filter_input(INPUT_POST, 'newPass', FILTER_DEFAULT);
    $repNewPass = filter_input(INPUT_POST, 'repNewPass', FILTER_DEFAULT);
    if ($newPass != $repNewPass) {
        throw new Exception('Your new password mismatch!');
    }
    $user->changePass($oldPass, $newPass);
    header('Location: profile.php');
    exit();
}