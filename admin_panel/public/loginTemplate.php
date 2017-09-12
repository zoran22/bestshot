<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>bestshot-фото портал</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <link href="<?= DIR; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Material Design Bootstrap -->
        <link href="<?= DIR; ?>public/css/mdb430.min.css" rel="stylesheet" type="text/css"/>

        <!-- Template styles -->
        <!--        <link href="../public/css/style.css" rel="stylesheet" type="text/css"/>-->
        <style>
            html,
            body,
            header,
            .view {
                height: 100%;
            }
            /* Navigation*/

            .navbar {
                background-color: #3F729B;
            }


            @media only screen and (max-width: 768px) {
                .navbar {
                    background-color: #3F729B;
                }
            }
            /*Intro*/

            .view {
                background: url("https://mdbootstrap.com/img/Photos/Horizontal/People/12-col/img%20(61).jpg")no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            @media (max-width: 768px) {
                .full-bg-img,
                .view {
                    height: auto;
                    position: relative;
                }
            }

            .description {
                padding-top: 25%;
                padding-bottom: 3rem;
                color: #fff
            }

            @media (max-width: 992px) {
                .description {
                    padding-top: 7rem;
                    text-align: center;
                }
            }


        </style>
    </head>
    <body>



        <!--Navigation & Intro-->
        <header>



            <!--Mask-->
            <div class="view hm-black-strong">
                <div class="full-bg-img flex-center">
                    <div class="container">
                        <div class="row" id="home">

                            <!--First column-->
                            <div class="col-lg-6">
                                <div class="description">
                                    <h2 class="h2-responsive wow fadeInLeft">Регистрирай се сега! </h2>
                                    <hr class="hr-dark wow fadeInLeft">
                                    <p class="wow fadeInLeft" data-wow-delay="0.4s"></p>
                                    <br>
                                    <a class="btn btn-outline-white btn-lg wow fadeInLeft" data-wow-delay="0.7s">Научи  повече</a>
                                </div>
                            </div>
                            <!--/.First column-->

                            <!--Second column-->
                            <div class="col-lg-6">
                                <!--Form-->
                                <form action="" method="post">
                                    <div class="card wow fadeInRight">
                                        <div class="card-block">
                                            <!--Header-->
                                            <div class="text-center">

                                                <h3><i class="fa fa-user"></i> Вход за администратор:</h3>

                                                <hr>
                                            </div>

                                            <!--Body-->

                                            <div class="md-form">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input name="email" type="text" id="form2" class="form-control">
                                                <label for="form2">Твоят email:</label>
                                            </div>

                                            <div class="md-form">
                                                <i class="fa fa-lock prefix"></i>
                                                <input name="password" type="password" id="form4" class="form-control">
                                                <label for="form4">Твоята парола:</label>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" name="submit"  value="Вход" class="btn btn-success btn-group-sm">Вход</button>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <!--/.Form-->
                            </div>
                            <!--/Second column-->
                        </div>
                    </div>
                </div>
            </div>
            <!--/.Mask-->

        </header>
        <!--/Navigation & Intro-->


        <!-- SCRIPTS -->

        <!-- JQuery -->
        <!--<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>-->
        <script src="<?= DIR; ?>public/js/jquery-2.2.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap tooltips -->
        <!--<script type="text/javascript" src="js/tether.min.js"></script>-->
        <script src="<?= DIR; ?>public/js/tether.js" type="text/javascript"></script>
        <!-- Bootstrap core JavaScript -->
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
        <script src="<?= DIR; ?>public/js/bootstrap.js" type="text/javascript"></script>
        <!-- MDB core JavaScript -->
        <!--<script type="text/javascript" src="js/mdb.min.js"></script>-->
        <script src="<?= DIR; ?>public/js/mdb.js" type="text/javascript"></script>
        <script>
            new WOW().init();
        </script>
    </body>

</html>