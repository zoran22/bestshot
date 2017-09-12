<?php
require_once '../app.php';
/* @var $app \Core\Application */
$app->checkLogin();

$commentService = new Service\CommentService($db);

$data['commentService'] = $commentService;

if (isset($_GET['a'])) {
    $commentId = filter_input(INPUT_GET, 'a', FILTER_VALIDATE_INT);
    $commentService->approveComment($commentId);
}
if (isset($_GET['delpage'])) {
    $commentId = filter_input(INPUT_GET, 'delpage', FILTER_VALIDATE_INT);
    $commentService->delComment($commentId);
}
$app->loadTemplate('commentsTemplate', $data);

