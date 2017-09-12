<?php require_once 'partials/header.php'; ?>

 <main>

    <!--Main layout-->
    <div id="main" class="container">
        <div class="row">


            <!--Main column PHOTO ARTICLE / GALLERY-->
            <div class="col-lg-8">

                <!--First row-->
                <div class="row wow fadeIn" data-wow-delay="0.4s">
                    <div class="col-md-12">
                        <!--Product-->
                        <div class="product-wrapper">

                            <!--Featured image-->
                            <div class="view overlay hm-zoom z-depth-1-half">
                                <!--<img src="uploads/gallery/images/foxx.jpg" class="img-fluid " alt="Head img">-->
                                <?php
                                /* @var $data \Data\Post */

                                ?>
                                <a data-fancybox="gallery" href="<?= DIRHEADIMG . $data['post']->getHead_image(); ?>">
                                <img src="<?= DIRHEADIMG . $data['post']->getHead_image(); ?>" class="img-fluid " alt="Head img"></a>
                                <div class="mask">
                                </div>

                            </div>
                            <!--/.Featured image-->

                            <br>

                            <!-- Gallery -->
                            <div>
                                <?php
                                for ($image = 0; $image < count($data['gallery']); $image++):

                                    ?>
                                    <a data-fancybox="gallery" href="<?= DIRGALLERY . $data['gallery'][$image]; ?>"><img class="animated fadeInDownBig" alt="gallery-photos" width="100" height="100" src="<?= DIRGALLERY . $data['gallery'][$image]; ?>"></a>
                                <?php endfor; ?>
                            </div>




                            <!-- ./ Gallery -->
                            <!--Product data-->
                            <h2  style="padding-top: 2rem" class="h2-responsive"><?= $data['post']->getTitle(); ?></h2>
                            <hr>
                            <p><?= $data['post']->getBody(); ?></p>
                            <ul class="rating inline-ul">

                                <li><i class="fa fa-star amber-text"></i></li>
                                <li><i class="fa fa-star amber-text"></i></li>
                                <li><i class="fa fa-star amber-text"></i></li>
                                <li><i class="fa fa-star amber-text"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <small class="pull-right text-muted">Posted at: <?= $data['post']->getCreated_at(); ?></small>
                        </div>
                        <!--Product-->

                    </div>
                </div>
                <!--/.First row-->
                <?php
                if (isset($_SESSION['msg'])) {

                    echo'<div class = "alert alert-success" role = "alert">
                                            <strong>Well done!</strong>' . $_SESSION['msg'] . '
                                            </div>';
                    unset($_SESSION['msg']);
                }

                ?>
                <!--Second row-->
                <div class="row">

                    <!--Heading-->
                    <div class="col reviews wow fadeIn" data-wow-delay="0.4s">
                        <h2 class="h2-responsive">Отзиви</h2>
                    </div>


                    <!--Comments-->

                    <?php
                    /* @var $comment Data\Comment */
                    /* @var $data['commentService'] Service\CommentService */

                    foreach ($data['comments'] as $comment):

                        if ($data['commentService']->emailIsUser($comment->getEmail())) {
                            $commentPic = DIRPROFILEIMAGES . $data['commentService']->emailIsUser($comment->getEmail());
                        } else {
                            $commentPic = DIRPROFILEIMAGES . 'profile.jpg';
                        }

                        ?>
                        <br><div class="media wow fadeIn col-md-12" data-wow-delay="0.2s" style="margin-bottom: 2rem">
                            <a class="media-left" href="<?= $commentPic; ?>">
                                <img class="img-circle rounded-circle" src="<?= $commentPic; ?>" alt="Generic placeholder image" width="80" height="80">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?= $comment->getName(); ?></h4>
                                <ul class="rating inline-ul">
                                    <?php for ($stars = 0; $stars < $comment->getRating(); $stars++): ?>

                                        <li><i class="fa fa-star amber-text"></i></li>

                                    <?php endfor; ?>
                                    <?php
                                    // Display the remaining (black) stars
                                    $total = 5;
                                    while ($stars < $total):

                                        ?>
                                        <li><i class="fa fa-star"></i></li>
                                        <?php
                                        $stars++;
                                    endwhile;

                                    ?>
                                </ul>
                                <p><?= $comment->getComment(); ?></p>
                                <small class="pull-right text-muted">Posted at: <?= $comment->getCreated_at(); ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!--/.Comments-->


                </div> <!-- /.row -->
                <hr>
                <!--/.Second row-->
                <!-- comments section -->

                <!-- /.comments section -->
                <!-- COMMENT FORM-->
                <div class="row">

                    <form action="single.php" method="POST">

                        <?php if (isset($_SESSION['user_email'])): ?>
                            <div class="media wow fadeIn" data-wow-delay="0.2s">
                                <a class="media-left" href="#">
                                    <img class="img-circle rounded-circle" src="<?= $userImg; ?>" alt="Generic placeholder image" height="80" width="80">
                                </a>

                                <div class="media-body">
                                    <h2 class="text-center">Comments</h2>

                                    <div class="form-group">

                                        <label for="name" class="text-fluid">Твоето име</label>
                                        <input type="text" name="name" placeholder="Your name" id="name" class="form-control" value="<?= $_SESSION['user_name']; ?>">
                                    </div>
                                    <div class="form-group">

                                        <label for="email" class="text-fluid">Имейл</label>
                                        <input type="email" name="email" placeholder="email" id="email" value="<?= $_SESSION['user_email']; ?>">

                                    </div>
                                <?php else: ?>
                                    <div class="media wow fadeIn" data-wow-delay="0.2s">
                                        <a class="media-left" href="">
                                            <img class="rounded-circle" src="<?= DIRPUBLIC; ?>img/profile.jpg" alt="Generic placeholder image" height="80" width="80">
                                        </a>

                                        <div class="media-body">
                                            <h2 class="text-center">Коментар</h2>
                                            <div class="form-group">

                                                <label for="name" class="text-fluid">Твоето име</label>
                                                <input type="text" name="name" placeholder="Твоето име" id="name" class="form-control">
                                            </div>
                                            <div class="form-group">

                                                <label for="email" class="text-fluid">Твоят email</label>
                                                <input type="email" name="email" placeholder="email" id="email">

                                            </div>
                                        <?php endif; ?>
                                        <!--<h4 class="media-heading">Ана Христова</h4>-->
                                        <!-- Category Seletct -->
                                        <input name="slug" type="text" hidden="" value="<?= $_GET['p']; ?>">
                                        <div class="form-group">
                                            <label class="text-fluid">Оценка</label>
                                            <div id="rateYo"></div>
                                            <input type="number" name="rating" hidden="" id="rating">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment_body" id="comment" cols="100" rows="10" placeholder="Вашият коментар!"></textarea>
                                        </div>
                                        <button class="btn btn-primary waves-effect btn-lg pull-right" type="submit" name="comment">Изпрати</button>
                                    </div>
                                </div>
                                </form>
                            </div> <!-- ./ COMMENTS -->
                        </div>
                        <!-- /. Main column PHOTO ARTICLE / GALLERY-->





                        <!--Sidebar-->
                        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

                            <div class="widget-wrapper">
                                <h4>Категории:</h4>
                                <br>
                                <div class="list-group">
                                    <a href="#" class="list-group-item active">Новини</a>
                                    <a href="#" class="list-group-item">Галерия</a>
                                    <a href="#" class="list-group-item">Блог</a>
                                </div>
                            </div>

                            <div class="widget-wrapper wow fadeIn" data-wow-delay="0.6s">
                                <h4>Форма за записване:</h4>
                                <br>
                                <div class="card">
                                    <div class="card-block">
                                        <p><strong>Запиши се за нашия бюлетин!</strong></p>
                                        <p>Веднъж седмично ще ти изпращаме информация за новостите!</p>
                                        <div class="md-form">
                                            <i class="fa fa-user prefix"></i>
                                            <input type="text" id="form1" class="form-control">
                                            <label for="form1">Твоето име</label>
                                        </div>
                                        <div class="md-form">
                                            <i class="fa fa-envelope prefix"></i>
                                            <input type="text" id="form2" class="form-control">
                                            <label for="form2">Твоят email</label>
                                        </div>
                                        <button class="btn btn-primary">Запиши се</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Sidebar-->



                </div>
            </div>
            <!--/.Main layout-->

            </main>

            <!--Footer-->
            <footer class="page-footer center-on-small-only unique-color-dark">

                <!--Footer Links-->
                <div class="container-fluid">
                    <div class="row">
                        <hr class="hidden-md-up">

                        <!--Second column-->
                        <div class="col-lg-2 col-md-4 offset-lg-1 footer1">
                            <h5 class="title">Последни</h5>
                            <ul>
                                <li><a href="#!">Новини</a></li>
                                <li><a href="#!">Фотографии</a></li>
                                <li><a href="#!">Обучения</a></li>
                                <li><a href="#!">Блог</a></li>
                            </ul>
                        </div>
                        <!--/.Second column-->

                        <hr class="hidden-md-up">

                        <!--Third column-->
                        <div class="col-lg-2 col-md-4 footer1">
                            <h5 class="title">За нашите гости и приятели </h5>
                            <ul>
                                <li><a href="#!">Пътеписи</a></li>
                                <li><a href="#!">Конкурси</a></li>
                                <li><a href="#!">Галерия</a></li>
                                <li><a href="#!">Връзка с нас</a></li>
                                <li><a href="#!">Условия за ползване</a></li>
                            </ul>
                        </div>
                        <!--/.Third column-->

                        <hr class="hidden-md-up">

                        <!--Fourth column-->
                        <div class="col-lg-2 col-md-4 footer1">
                            <h5 class="title">Последвайте ни</h5>
                            <ul>
                                <li><a class="btn btn-social-icon btn-twitter">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-social-icon btn-facebook">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn btn-social-icon btn-instagram">
                                        <span class="fa fa-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--/.Fourth column -->

                    </div>
                </div>
                <!--class/.footer1 Links -->

                <hr>

                <!--Copyright-->
                <div class="footer-copyright">
                    <div class="container-fluid">
                        © 2017 Copyright: <a href="#"> bestShot.bg </a>


                    </div>
                </div>
                <!--/.Copyright -->

            </footer>
            <!--/.Footer -->


                    <!-- SCRIPTS -->

                    <!-- JQuery -->
                    <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/jquery-2.2.3.min.js"></script>

                    <!-- Bootstrap tooltips -->
                    <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/tether.min.js"></script>

                    <!-- Bootstrap core JavaScript -->
                    <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/bootstrap.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
                    <!-- MDB core JavaScript -->
                    <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/mdb.min.js"></script>
                    <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/comment.js"></script>
                    <!-- Gallery animations -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
                    <script src="<?= DIRPUBLIC; ?>js/search.js" type="text/javascript"></script>
                    <script>
                        new WOW().init();
                        $(function() {
                            $("#rateYo").rateYo({
                                rating: 3,
                                fullStar: true
                            });

                            if ($('#rating').val() === '') {
                        $('#rating').val($('#rateYo').rateYo('rating'));
                    		};

                            $('#rateYo').click(function() {
                                var numStars = $('#rateYo').rateYo('rating');
                                $('#rating').val(numStars);
                            });
                        });
                    </script>
                    </body>
                    </html>