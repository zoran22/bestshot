<?php
require_once '../app.php';

/* @var $user Service\UserService */
$app->checkLogin();



$userService = new Service\UserService($db);
$postService = new \Service\PostService($db);
$commentService = new Service\CommentService($db);
$currentUser = $_SESSION['role_id'];

$data['userService'] = $userService;
$data['postService'] = $postService;
$data['commentService'] = $commentService;
$data['role_id'] = $_SESSION['role_id'];

$postId = filter_input(INPUT_GET, 'delpage', FILTER_VALIDATE_INT);

if (isset($postId)) {
    $postD = new \Service\PostService($db);
    $postD->deletePost($postId);

    exit();
}

// Free disk space display
$units = explode(' ', 'B KB MB GB TB PB');
$SIZE_LIMIT = 1048576000; // 1000MB (not 1024) - 000webhost gives 1000mb
//$disk_used = foldersize("/webData/users/vdbuilder@yahoo.com");
$disk_used = foldersize(PROJECTPATH);

$disk_remaining = $SIZE_LIMIT - $disk_used;


//echo('diskspace used: ' . format_size($disk_used) . '<br>');
//echo( 'diskspace left: ' . format_size($disk_remaining) . '<br><hr>');
$data['diskUsed'] = format_size($disk_used);
$data['diskSpace'] = format_size($disk_remaining);

function foldersize($path)
{
    $total_size = 0;
    $files = scandir($path);
    $cleanPath = rtrim($path, '/') . '/';

    foreach ($files as $t) {
        if ($t <> "." && $t <> "..") {
            $currentFile = $cleanPath . $t;
            if (is_dir($currentFile)) {
                $size = foldersize($currentFile);
                $total_size += $size;
            } else {
                $size = filesize($currentFile);
                $total_size += $size;
            }
        }
    }

    return $total_size;
}

function format_size($size)
{
    global $units;

    $mod = 1024;

    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }

    $endIndex = strpos($size, ".") + 3;

    return substr($size, 0, $endIndex) . ' ' . $units[$i];
}
/* @var $app \Core\Application */
$app->loadTemplate('indexTemplate', $data);

