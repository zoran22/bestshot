<?php
require_once '../app.php';
/* @var $app Core\Application */
$app->checkLogin();

$commentService = new Service\CommentService($db);
$data['commentService'] = $commentService;

//if (isset($_GET['b'])) {
//    $commentId = filter_input(INPUT_GET, 'b', FILTER_VALIDATE_INT);
//    $commentService->banComment($commentId);
//}

if (isset($_GET['changestatus'])) {
    $status = filter_input(INPUT_GET, 'changestatus', FILTER_VALIDATE_INT);
    $commentId = filter_input(INPUT_GET, 'commentid', FILTER_VALIDATE_INT);

    // TODO ternary
    if (($status == null) || ($status == '2')) {
        $status = '1';
       
    } else {
        $status = '2';
       
    }

    if ($commentService->changeStatus($commentId, $status)) {
        header('Location: allComments.php');
        exit();
    }
}
if (isset($_GET['delpage'])) {
    $commentId = filter_input(INPUT_GET, 'delpage', FILTER_VALIDATE_INT);
    $commentService->delComment($commentId);
}
$app->loadTemplate('allCommentsTemplate', $data);