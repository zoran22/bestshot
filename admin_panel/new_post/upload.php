<?php
if (isset($_POST['submit'])) {
    $j = 0;     // Variable for indexing uploaded image.
    $target_path = "uploads/";     // Declaring Path for uploaded images.
    $imgsForDb = [];
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
// Loop to get individual element from the array
        // Extensions which are allowed.
        $validextensions = array("jpeg", "jpg", "png");

        // Explode file name from dot(.)
        $ext = explode('.', basename($_FILES['file']['name'][$i]));

        // Store extensions in the variable.
        $file_extension = end($ext);

// Increment the number of uploaded images according to the files in array.
        $j = $j + 1;

        // Approx. 2MB files can be uploaded.
        if (($_FILES["file"]["size"][$i] < 2097152) && in_array($file_extension, $validextensions)) {

            // Set the target path with a new name of image.
            $target_path1 = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path1)) {
                // If file moved to uploads folder.
                $imgsForDb[] = $target_path1;
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {
                //  If File Was Not Moved.
                echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {
            //   If File Size And File Type Was Incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}



