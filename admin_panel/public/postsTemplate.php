<?php require_once 'public/partials/header.php'; ?>
<div id="page-wrapper" class="container-fluid">
    <h2 class="text-center">Статии</h2>
    <table id="table" class="table table-striped table-responsive no-more-tables" >
        <thead>
            <tr>
                <th>#</th>
                <th>Изображение</th>
                <th>Заглавие</th>
                <th>Съдържание</th>
                <th>Създадено на</th>
                <th>URL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            /* @var $data['postService'] \Service\PostService */
            /* @var $post \Data\Post */
            /* @var $data['pendingComments'] Service\CommentService */
            foreach ($data['postService']->getPages() as $post):

                ?>
            <style>
                #comment-field {
                    width: 53px;
                    height: 117px
                }
                /* CSS used here will be applied after bootstrap.css */
                .badge-notify{
                    background:red;
                    position:relative;
                    top: -50px;
                    left: 20px;
                }
                #comment-link:hover {
                    cursor: pointer;
                    text-decoration: none;
                }
            </style>
            <tr>
                <th scope="row"><?= $post->getId(); ?></th>
                <td><img src="<?= DIRHEADIMG . $post->getHead_image(); ?>" class="img img-responsive" alt="img"height="90" width="160" ></td>
                <td><a href="<?= DIR; ?>single.php?p=<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a></td>
                <td><div style="width: 300px; height: 100px; overflow: auto"><?= $post->getBody(); ?></div></td>
                <td><?= $post->getCreated_at(); ?></td>
                <td><?= $post->getSlug(); ?></td>
                <td id="comment-field">
                    <a href="<?= DIRADMINPANEL; ?>comments.php?c=<?= $post->getId(); ?>" style="font-size:36px;" id="comment-link" title="Коментари">
                        <span class="glyphicon glyphicon-comment">
                        </span>

                    </a>
                    <?php
                    if ($data['pendingComments']->getNumber($post->getId()) > 0) {
                        echo '<span class="badge badge-notify">' . $data['pendingComments']->getNumber($post->getId()) . '</span>';
                    }

                    ?>

                </td>
                <td><a href="<?= DIR; ?>single.php?p=<?= $post->getSlug(); ?>" class="btn btn-success btn-circle"><span class="glyphicon glyphicon-eye-open" title="Разгледай"></span></a></td>
                <td><a href="<?= DIRADMINPANEL; ?>editpage.php?id=<?= $post->getSlug(); ?>" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-pencil" title="Редактирай"></span></a></td>
                <td><a href="javascript:delPage('<?= $post->getId(); ?>', '<?= $post->getSlug(); ?>')" class="btn btn-danger btn-circle"><span class="glyphicon glyphicon-trash" title="Изтрий"></span></a></td>
                </td>
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


</div>
<!-- jQuery -->

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
        if (confirm("Are you sure you want to delete '" + title + "'?")) {
            window.location.href = '<?= DIRADMINPANEL; ?>posts.php?delpage=' + id;
        }
    }



</script>
</body>

</html>