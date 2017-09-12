<?php
include './app.php';

$postService = new Service\PostService($db);
$limit = (int) $_GET['limit'];
$offset = (int) $_GET['offset'];


/* @var $post \Data\Post */
foreach ($postService->getPagesOffset($limit, $offset) as $post):

    ?>
    <div style="margin-top: 1rem" class="col-lg-4 postCard">
        <!--Card-->
        <div class="card wow fadeIn" data-wow-delay ="0.2s">

            <!--Card image-->
            <div class ="view overlay hm-white-slight">
                <img src="<?= DIRHEADIMG . $post->getHead_image(); ?>" class ="img-fluid" alt = "Main image">
                <a href = "single.php?p=<?= $post->getSlug(); ?>">
                    <div class = "mask"></div>
                </a>
            </div>
            <!--/.Card image-->

            <!--Card content-->
            <div class = "card-block">
                <!--Title-->
                <h4 class = "card-title"><?= $post->getTitle(); ?></h4>
                <!--Text-->
                <p class="card-text bodyText"><?= Core\Application::customLength($post->getBody(), 200); ?></p>
                <a href="single.php?p=<?= $post->getSlug(); ?>" class="btn btn-primary">Научи повече</a>
            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->
    </div>

    <?php
endforeach;

