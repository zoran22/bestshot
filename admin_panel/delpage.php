<?php
require_once '../app.php';
$postService = new Service\PostService($db);
if (isset($_GET['delpage'])) {
    // $postService = new \Service\PostService($db);
    $postService->deletePost($postId);
    exit();
}

