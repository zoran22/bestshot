<?php
require_once '../app.php';

// Redirects to login whether session expired, not logged in or user is not admin
$app->checkLogin();


if (isset($_POST['submit'])) {
    // $slug = $_POST['slug'];
    $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);
    $checkSlug = new \Service\PostService($db);
    if ($checkSlug->checkSlug($slug) > 0) {
        echo "The slug '" . $slug . "' is already taken. Try another one!";
        exit();
    }
    if (isset($_FILES['file'])) {

        $j = 0;     // Variable for indexing uploaded image.
        /**
         * Path to the uploads folder for gallery
         */
        $target_path = DIRGALLERYIMGS;     // Declaring Path for uploaded images.
        //== Multiple file uploads ================================================
        $galleryImgs = [];
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            // Loop to get individual element from the array
            // Extensions which are allowed.
            $validextensions = array("jpeg", "jpg", "png");

            // Explode file name from dot(.)
            $ext = explode('.', basename($_FILES['file']['name'][$i]));

            // Store extensions in the variable as well as make it lowercase

            $file_extension = strtolower(end($ext));

// Increment the number of uploaded images according to the files in array.
            $j = $j + 1;

            // Approx. 2MB files can be uploaded.
            if (($_FILES["file"]["size"][$i] < 2097152) && in_array($file_extension, $validextensions)) {


                // Set the target path with a new name of image.
                $target_path1 = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];

                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path1)) {
                    // If file moved to uploads folder.
                    // =======================================
                    $newName1 = explode('/', $target_path1);
                    $newName2 = end($newName1);
                    $galleryImgs[] = $newName2;

                    // TEST
                    // echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                } else {
                    //  If File Was Not Moved.
                    //  TEST
                    //  echo $j . ').<span id="error">please try again!.</span><br/><br/>';
                }
            } else {
                //TEST
                //   If File Size And File Type Was Incorrect.
                //  echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
            }
        }
    }
// Head image upload
    $headImg = null;
    $target_head_path = "../public/uploads/head_image/";
    $valid_head_ext = array("jpeg", "jpg", "png");
    $get_img_ext = explode('.', basename($_FILES['head_image']['name']));
    // var_dump($get_img_ext);
    $head_img_ext = strtolower(end($get_img_ext));

    if ($_FILES["head_image"]["size"] < 2097152 && in_array($head_img_ext, $valid_head_ext)) {
        $target_head_path1 = $target_head_path . md5(uniqid()) . "." . $head_img_ext;

        if (move_uploaded_file($_FILES['head_image']['tmp_name'], $target_head_path1)) {
            // echo 'Head Image uploaded successfully!';
        } else {
            echo 'Head Image uplaoading failed! Please try again!';
        }
        //get new image name only without path

    $newName3 = explode('/', $target_head_path1);
    $headImg = end($newName3);
    }
    


    $postService = new \Service\PostService($db);
    if ($postService->addPage($headImg, $galleryImgs)) {
        header('Location: posts.php');
        exit();
    }
}


$data = null;

if (isset($_SESSION['user_id'])) {
    $userService = new \Service\UserService($db);
    $data['user'] = $userService->getCurrentUser($_SESSION['user_id']);
}
/* @var $app Core\Application */
$app->loadTemplate('createpostTemplate', $data);

