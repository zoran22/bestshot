<?php
require_once './app.php';

use Service\UserService;

//$user = new UserService($db);
if (isset($_POST['submit'])) {
    $userService = new UserService($db);

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $confirmPassword = filter_input(INPUT_POST, 'confirm_password', FILTER_DEFAULT);
// Maybe a profile pic
    $profilePic = null;

    if (isset($_FILES['profile_pic'])) {

        $target_head_path = DIRPROFILEIMG;
        // echo DIRPROFILEIMG;
        $valid_head_ext = array("jpeg", "jpg", "png");
        $get_img_ext = explode('.', basename($_FILES['profile_pic']['name']));
        $head_img_ext = strtolower(end($get_img_ext));
        if ($_FILES["profile_pic"]["size"] < 2097152 && in_array($head_img_ext, $valid_head_ext)) {
            $target_head_path1 = $target_head_path . md5(uniqid()) . "." . $head_img_ext;

            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_head_path1)) {
                //get new image name only without path
                $newName3 = explode('/', $target_head_path1);
                $profilePic = end($newName3);
            } else {
                echo 'Head Image uplaoading failed! Please try again!';
            }
        }
    }




    if ($userService->register($name, $email, $password, $confirmPassword, $profilePic)) {

        $_SESSION['activation'] = "Success";
        header('Location: login.php');
        exit();
    }
}
/* @var $app \Core\Application */

$app->loadTemplate('registerTemplate');