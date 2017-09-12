<?php

use Service\CommentService;
use Service\PostService;
use Service\UserService;

require_once './app.php';

$postService = new PostService($db);
$postSlug = filter_input(INPUT_GET, 'p', FILTER_DEFAULT);

// Create new comment
if (isset($_POST['comment'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $body = filter_input(INPUT_POST, 'comment_body', FILTER_SANITIZE_SPECIAL_CHARS);
    $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
    // Small fix
    $slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);
    $postID = $postService->getIdFromSlug($slug);
    //Check if a registered user with the same email already exists
    $user = new UserService($db);
    if ($user->checkMailExists($email) && ($_SESSION['user_email'] !== $email)) {
        throw new Exception('A user with this email already exists!');
    }
    $ratingStr = (string) $rating;

    $newComment = new CommentService($db);
    if ($newComment->addComment($name, $email, $body, $postID, $ratingStr)) {
        $msg = "The comment was submitted, and it is pending for aproval";
        $_SESSION['msg'] = $msg;

        header('Location: single.php?p=' . $slug);
        exit();
    }
}

$commentService = new CommentService($db);

if (isset($_SESSION['user_id'])) {
    $userService = new UserService($db);
    $data['user'] = $userService->getCurrentUser($_SESSION['user_id']);
}


$data['post'] = $postService->getSinglePost($postSlug);
$data['gallery'] = $postService->getGallery($postSlug);
$data['comments'] = $commentService->getCommentsFromPost($postService->getIdFromSlug($postSlug));
$data['commentService'] = $commentService;

$app->loadTemplate('singleTemplate', $data);