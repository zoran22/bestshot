<?php


require_once './app.php';

$data = null;

if (isset($_SESSION['user_id'])) {
    $userService = new \Service\UserService($db);
    $data['user'] = $userService->getCurrentUser($_SESSION['user_id']);
}
$user = new \Service\PostService($db);

/* @var $app \Core\Application */
$app->loadTemplate('indexTemplate', $data);
