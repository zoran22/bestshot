<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>bestshot.ml-регистрация</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= DIRPUBLIC; ?>img/favicon.ico">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">


        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="<?= DIRPUBLIC; ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css" rel="stylesheet">
        <style>

            .wow {
                visibility: hidden;
            }

            html,
            body,
            header,
            .view {
                height: 100%;
            }
            /* Navigation*/

            .navbar {
                background-color: transparent;
            }

            .top-nav-collapse {
                background-color: #3F729B;
            }

            @media only screen and (max-width: 768px) {
                .navbar {
                    background-color: #3F729B;
                }
            }
            /*Intro*/

            .view {
                background: url("img/small.jpg")no-repeat center center fixed;
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
      #register{
margin-top:6%;
}
.md-form .prefix~label {
    margin-left: 3rem;
    width: 92%;
    width: calc(100% - 3rem)
}
@media only screen and (max-width: 992px) {
    .md-form .prefix~label {
        width:86%;
        width: calc(100% - 3rem)
    }
}

@media only screen and (max-width: 600px) {
    .md-form .prefix~label {
        width:80%;
        width: calc(100% - 3rem)
    }
}
        </style>
    </head>
    <body>

        <!--Navigation & Intro-->
        <header>
            <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-
                            target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?= DIRPUBLIC; ?>img/logo6.png">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav1">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Начало <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Новини</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Галерия</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Блог</a>
                            </li>

                        </ul>

                        <form class="form-inline waves-effect waves-light">
                            <input class="form-control" type="text" placeholder="Търсене">
                        </form>
                        <ul id="forms" class="navbar-nav mr-auto">

                            <!--Navbar icons-->
                            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
            <!--/.Navbar-->

            <!--Mask-->
            <div class="view hm-black-strong">
                <div class="full-bg-img flex-center">
                    <div id="register" class="container">
                        <div class="row" id="home">

                            <!--First column-->
                            <div class="col-lg-6">
                                <div class="description">
                                    <h2 class="h2-responsive wow fadeInLeft" data-wow-delay="0.3s">Регистрирайте се сега!</h2>
                                    <hr class="hr-dark wow fadeInLeft" data-wow-delay="0.3s">
                                    <p class="wow fadeInLeft" data-wow-delay="0.3s">Регистрирайте се, за да сте първите информирани!</p>
                                    <br>
                                    <a class="btn btn-outline-white btn-lg wow fadeInLeft" data-wow-delay="0.3s">Научете повече</a>
                                </div>
                            </div>
                            <!--/.First column-->

                            <!--Second column-->
                            <div id="regForm" class="col-lg-6">
                                <!--Form-->
                                <form id="registerForm" action="" method="post" enctype="multipart/form-data">
                                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                        <div class="card-block">
                                            <!--Header-->
                                            <div class="text-center">
                                                <h3><i class="fa fa-user"></i> Регистрирай се:</h3>
                                                <hr>
                                            </div>

                                            <!--Body-->
                                            <div class="md-form">
                                                <i class="fa fa-user prefix"></i>
                                                <input name="name" type="text" id="form3" class="form-control validate name">
                                                <label id="nameForm" for="form3" data-error="Поне 3 символа" data-success="Коректно попълване">Име и Фамилия</label>
                                            </div>
                                            <div class="md-form">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input name="email" type="text" id="form2" class="form-control validate email">
                                                <label for="form2" data-error="Поне 3 символа" data-success="Коректно попълване">Твоят email</label>
                                            </div>

                                            <div class="md-form">
                                                <i class="fa fa-lock prefix"></i>
                                                <input name="password" type="password" id="form4" class="form-control validate password">
                                                <label for="form4" data-error="Поне 3 символа" data-success="Коректно попълване">Твоята парола</label>
                                            </div>

                                            <div class="md-form">
                                                <i class="fa fa-lock prefix"></i>
                                                <input name="confirm_password" type="password" id="form5" class="form-control validate confirm_password">
                                                <label for="form5" data-error="Поне 3 символа" data-success="Коректно попълване" >Потвърди паролата</label>
                                            </div>
                                             
<div class="md-form">
                                                <i class="fa fa-photo  prefix"></i>
                                                <input name="profile_pic" type="file" id="profile_pic" aria-describedby="fileHelp">

                                                <small id="fileHelp" class="form-text text-muted">Профилна снимка. Само JPEG,PNG,JPG изображения са позволени. Размерът на изображението трябва да е по-малък от 2MB.</small>
                                                <!--                                                <label for="profile_pic">Profile photo:</label>-->
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="submit" name="submit" class="btn  btn-default btn-ins btn-lg">Регистрирай се</button>
                                                <hr>
                                                <fieldset class="form-group">
                                                    <input name="subscribe" type="checkbox" id="checkbox1">
                                                    <label for="checkbox1">Запиши ме за информационния бюлетин</label>
                                                </fieldset>
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
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/jquery-3.1.1.min.js"></script>

        <!-- Tooltips -->
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/tether.min.js"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/mdb.min.js"></script>
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/register.js"></script>
        <script>
            new WOW().init();
        </script>


    </body>

</html>