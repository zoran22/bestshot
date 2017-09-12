<?php
include './app.php';
$postService = new \Service\PostService($db);

if (!empty($_POST['keywords'])) {
    $keywordsLow = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_SPECIAL_CHARS);
    $keywords = strtolower($keywordsLow);
    echo json_encode($postService->searchPost($keywords));
}


