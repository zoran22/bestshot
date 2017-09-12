<?php

use Service\UserService;

require_once './app.php';

$user = new UserService($db);
//$userId = $_SESSION['userId'];
if (isset($_POST['change_pass'])) {
    $oldPass = trim(filter_input(INPUT_POST, 'oldPass', FILTER_DEFAULT));
    $newPass = trim(filter_input(INPUT_POST, 'newPass', FILTER_DEFAULT));
    $repNewPass = trim(filter_input(INPUT_POST, 'repeatNewPass', FILTER_DEFAULT));
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));

    if ($newPass != $repNewPass) {
        throw new Exception('Your new password mismatch!');
    }

    if ($user->changePass($oldPass, $newPass, $id)) {
        echo json_encode(['name' => 'Success!']);
    }
    return false;
//    header('Location: profile.php');
//    exit();
}

if (isset($_POST['name'])) {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
    if ($user->changeName($name, $id)) {
        $json = ['name' => $user->getCurrentUser($id)->getName()];
        echo json_encode($json);
    }
}

if (isset($_POST['email'])) {
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
    if ($user->changeEmail($email, $id)) {
        /* @var $email Data\User */
//        $email->getProfile_pic()
        $json = ['name' => $user->getCurrentUser($id)->getEmail()];
        echo json_encode($json);
    }
}



if (!empty($_POST['keywords'])) {
    $keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_SPECIAL_CHARS);
//    $keywords = strtolower($keywordsLow);
    if ($user->checkMailExists($keywords)) {
        $json = ['name' => $keywords];
        echo json_encode($json);
    }
}


$profilePic = null;

if (isset($_FILES['profile_pic'])) {
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
    $target_head_path = DIRPROFILEIMG;
    // echo DIRPROFILEIMG;
    $valid_head_ext = array("jpeg", "jpg", "png");
    $get_img_ext = explode('.', basename($_FILES['profile_pic']['name']));
    $head_img_ext = strtolower(end($get_img_ext));
    if ($_FILES["profile_pic"]["size"] < 2097152 && in_array($head_img_ext, $valid_head_ext)) {
        $target_head_path1 = $target_head_path . md5(uniqid()) . "." . $head_img_ext;
        $json['message'] = '';
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_head_path1)) {
            $userPhoto = $user->getCurrentUser($id)->getProfile_pic();
            // delete headimage if exists
            if ($userPhoto != null) {
                // get head_image path

                $headImgName = DIRPROFILEIMG . $userPhoto;
                if (!unlink($headImgName)) {
                    $json['message'] = ' Unable to delete your old profile photo';
                } else {
                    $json['message'] = ' Your old profile photo was deleted';
                }
            }

            //get new image name only without path
            $newName3 = explode('/', $target_head_path1);
            $profilePic = end($newName3);
            if ($user->updateProfilePic($id, $profilePic)) {
                $json['success'] = 'Your profile image was updated';
                echo json_encode($json);
            }
        } else {
            echo 'Head Image uplaoading failed! Please try again!';
        }
    }
}


// Delete profile image
if (isset($_POST['delImage'])) {
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT));
    $userPhoto = $user->getCurrentUser($id)->getProfile_pic();
    if ($userPhoto != '') {
        // get head_image path
        $headImgName = DIRPROFILEIMG . $userPhoto;
        if (!unlink($headImgName)) {
            $json['message'] = 'Unable to delete your old profile photo';
            echo json_encode($json);
        } else {
            if ($user->updateProfilePic($id)) {
                $json['message'] = 'Your profile photo was deleted';
                echo json_encode($json);
            }
        }
    } elseif ($userPhoto == null) {
        $json['message'] = 'You don\'t have any photo';
        echo json_encode($json);
    }
}
