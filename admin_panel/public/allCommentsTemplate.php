<?php require_once 'public/partials/header.php'; ?>
<div id="page-wrapper" class="container-fluid">
    <h2 class="text-center">Всички Коментари</h2>
    <table id="table" class="table table-striped table-responsive no-more-tables" >
        <thead>
            <tr>
                <th>#</th>
                <th>Изображение</th>
                <th>Статия</th>
                <th>Коментар</th>
                <th>Създаден на</th>
                <th>Имейл</th>
                <th>Име</th>
                <th>Рейтинг</th>
                <th>Раз</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            /* @var $data['postService'] \Service\PostService */
            /* @var $post \Data\Post */
            /* @var $data['commentService'] Service\CommentService */
            /* @var $comment Data\AllPendingComment */
            foreach ($data['commentService']->getAllComments() as $comment):
//                        $commentStatus = $comment->getApproved();
//                        $comment_id = $comment->getComment_id();
//                        $commentBody = $comment->getComment();

                ?>

                <tr>
                    <th scope="row"><?= $comment->getComment_id(); ?></th>
                    <td class="img"><img src="<?= DIRHEADIMG . $comment->getPost_image(); ?>" class="img-responsive" alt="img" width="100" height="65"></td>
                    <td><a href="<?= DIR; ?>single.php?p=<?= $comment->getSlug(); ?>"><?= $comment->getPost_title(); ?></a></td>
                    <td><div style="width: 20rem; overflow: auto"><?= $comment->getComment(); ?></div></td>
                    <td><?= $comment->getCreated_at(); ?></td>
                    <td><?= $comment->getEmail(); ?></td>
                    <td><?= $comment->getName(); ?></td>
                    <td><?php for ($index = 0; $index < $comment->getRating(); $index++): ?>
                            <p class="fa fa-star" style="color: orange"></p>
                        <?php endfor; ?>
                    </td>
                    <?php
                    if ($comment->getApproved() === '1') {
                        $statusText = 'ban';
                        $hintText = 'Скрий (ban)';
                    } else {
                        $statusText = 'publish';
                        $hintText = 'Публикувай';
                    }

                    ?>
                    <td><a href="javascript:changeStatus('<?= $comment->getComment(); ?>', '<?= $comment->getComment_id(); ?>', '<?= $comment->getApproved(); ?>', '<?= $statusText; ?>')" class="switch" title="<?= $hintText; ?>">
                            <input id="check" type="checkbox" <?php
                            if ($comment->getApproved() === '1') {
                                echo 'checked';
                            }

                            ?>
                                   >
                            <div class="slider round"></div>
                        </a></td>
                    <td><a href="javascript:delPage('<?= $comment->getComment_id(); ?>', '<?= $comment->getComment_id(); ?>')" class="btn btn-danger btn-circle" title="Изтрий"><span class="glyphicon glyphicon-trash"></span></a></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <nav aria-label="...">
        <ul class="pager">
            <li><a href="#">Предишна</a></li>
            <li><a href="#">Следваща</a></li>
        </ul>
    </nav>




</div> <!-- container -->

<script src="<?= DIRADMINPANEL; ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= DIRADMINPANEL; ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= DIRADMINPANEL; ?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= DIRADMINPANEL; ?>vendor/raphael/raphael.min.js"></script>
<!-- Togle switch button On/Off -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!--<script src="../vendor/morrisjs/morris.min.js" type="text/javascript"></script>
<script src="../data/morris-data.js" type="text/javascript"></script>-->
<!-- Custom Theme JavaScript -->
<script src="<?= DIRADMINPANEL; ?>dist/js/sb-admin-2.js"></script>

<script>
    function delPage(id, title)
    {
        if (confirm("Are you sure you want to delete the comment nr. '" + title + "'?")) {
            window.location.href = '<?= DIRADMINPANEL; ?>allComments.php?delpage=' + id;
        }
    }
    function changeStatus(comment, idComment, status, statusText) {

        if (confirm("Are you sure you want to " + statusText + " this comment: '" + comment + "' ?")) {
            window.location.href = '<?= DIRADMINPANEL; ?>allComments.php?changestatus=' + status + '&commentid=' + idComment;

        }
    }
</script>
</body>

</html>