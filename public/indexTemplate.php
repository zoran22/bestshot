<?php require_once 'partials/header.php'; ?>

        <!--Carousel Wrapper-->
        <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="10000">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-3" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-3" data-slide-to="1"></li>
                <li data-target="#carousel-example-3" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!-- First slide -->
                <div class="carousel-item active view hm-black-light" style="background-image: url('img/small.jpg'); background-repeat: no-repeat; background-size: cover;">
                    <!-- Caption -->
                    <div class="full-bg-img flex-center white-text">
                        <ul class="animated fadeIn col-md-12">
                            <li>
                                <h1 class="h1-responsive">Седмица на най-добрите снимки </h1>
                            </li>
                            <li>
                                <p>Покажи своите умения на конкурс в София ( 10.07.2017-16..07.2017 )</p>
                            </li>
                            <li>
                                <a target="_blank" class="btn btn-info btn-lg" rel="nofollow" href="single_1.php">Научи повече</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.Caption -->


                </div>
                <!--/.First slide-->

                <!-- Second slide -->
                <div class="carousel-item view hm-black-light" style="background-image: url('img/rila1.jpg'); background-repeat: no-repeat; background-size: cover;">
                    <!-- Caption -->
                    <div class="full-bg-img flex-center white-text">
                        <ul class="animated fadeIn col-md-12">
                            <li>
                                <h2 class="h1-responsive">Рила - толкова много величие!</h2></li>
                            <li>
                                <p>Красота и факти</p>
                            </li>
                            <li>
                                <a target="_blank" class="btn btn-info btn-lg" rel="nofollow" href="single_1.php">Научи повече</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.Caption -->


                </div>
                <!--/.Second slide -->

                <!-- Third slide -->
                <div class="carousel-item view hm-black-light" style="background-image: url('img/child.jpg'); background-repeat: no-repeat; background-size: cover;">

                    <!-- Caption -->
                    <div class="full-bg-img flex-center white-text">
                        <ul class="animated fadeIn col-md-12">
                            <li>
                                <h1 class="h1-responsive">Детски емоции</h1></li>
                            <li>
                                <p>Улови тяхната усмивка!</p>
                            </li>
                            <li>
                                <a target="_blank" class="btn btn-info btn-lg" rel="nofollow" href="single_1.php">Виж повече</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.Caption -->

                </div>
                <!--/.Third slide-->
            </div>
            <!--/.Slides-->

            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->

        <br>

        <!--Content-->
        <div class="container">
            <div class="row posts">




                <!-- 9 ARTICLES  ###########################################################-->
                <!--First columnn-->


            </div>
        </div> <!-- End container  -->
<div class="loaderImage fixed-top">
    <img src="public/img/486.gif" alt ="loading animation">
</div>

<!--Back to Top-->
<a href="#0" class="cd-top">Top</a>
     <!-- LOAD MORE BUTTON -->


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
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/contact.js"></script>
        <script src="<?= DIRPUBLIC; ?>js/search.js" type="text/javascript"></script>
        <script>
            new WOW().init();
        </script>

    </body>

</html>