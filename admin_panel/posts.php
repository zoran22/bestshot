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
$data['pendingComments'] = $commentService;
$data['role_id'] = $_SESSION['role_id'];
$postId = filter_input(INPUT_GET, 'delpage', FILTER_VALIDATE_INT);
if (isset($postId)) {
    $postForDel = new \Service\PostService($db);
    $postForDel->deletePost($postId);
   
}
if (isset($_GET['c'])) {
    $commentService->getPendingComment($_GET['c']);
}

/* @var $app \Core\Application */
$app->loadTemplate('postsTemplate', $data);