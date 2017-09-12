<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>bestShot-вход фото портал</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= DIRPUBLIC; ?>img/favicon.ico">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">


        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="<?= DIRPUBLIC; ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <!-- Material Design Bootstrap -->
        <link href="<?= DIRPUBLIC; ?>css/mdb430.min.css" rel="stylesheet" type="text/css"/>

        <!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css"/>-->
        <link href="<?= DIRPUBLIC; ?>css/login-register.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <header>
            <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?= DIRPUBLIC; ?>img/logo6.png" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav1">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Начало <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="post.php">Новини</a>
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

                        <!--Navbar icons-->
                        <ul id="forms" class="nav navbar-nav nav-flex-icons ml-auto">
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

            <div class="view hm-black-strong">
                <div class="full-bg-img flex-center">
                    <div class="container">
                        <div class="row" id="home">

                            <!--First column-->
                            <div class="col-lg-6">
                                <div class="description">
                                    <h2 class="h2-responsive wow fadeInLeft" data-wow-delay="0.3s">Регистрирайте се сега! </h2>
                                    <hr class="hr-dark wow fadeInLeft" data-wow-delay="0.3s">
                                    <p class="wow fadeInLeft" data-wow-delay="0.3s">Регистрацията ви дава възможност да научавате първи новините, да качвате ваши снимки, да участвате в конкурси!</p>
                                    <br>
                                    <a class="btn btn-outline-white btn-lg wow fadeInLeft" data-wow-delay="0.3s" href="register.php">Научете повече!</a>
                                </div>
                            </div>
                            <!--/.First column-->

                            <!--Second column-->
                            <div class="col-lg-6">
                                <!--Form-->

                                <form id="login-form" action="" method="post">
                                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                        <div class="card-block">
                                            <!--Header-->
                                            <div class="text-center">
                                                <h3><i class="fa fa-user"></i> Вход</h3>
                                                <hr>
                                            </div>
                                            <?php
                                            if (isset($_SESSION['activation'])) {
                                                echo '<div class="alert alert-success" role="alert">
                                                <strong>Готово!</strong> Изпратихме ви email с линк за активация!
                                            </div>';
                                                unset($_SESSION['activation']);
                                            }
                                            if (isset($_GET['action'])) {

                                                //check the action
                                                switch ($_GET['action']) {
                                                    case 'active':
                                                        echo "<h2 class='bg-success'>Вашият акаунт е активен!  .</h2>";
                                                        break;
                                                    case 'reset':
                                                        echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                                        break;
                                                }
                                               
                                            }
                                 // If wrong credentials input, outputs an error message and unset the'error' key
                                            if (isset($_SESSION['error'])) {
                                                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                                                unset($_SESSION['error']);
                                            }

                                            ?>
                                            <!--Body-->

                                            <div class="md-form">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="form2" class="form-control loginemail" name="email" >
                                                <label for="form2">Твоят email</label>
                                            </div>

                                            <div class="md-form">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="form4" class="form-control loginpassword" name="password" >
                                                <label for="form4">Твоята парола</label>
                                            </div>

                                            <div class="text-center">
                                                <button class="btn  btn-default btn-ins btn-lg" id="login" name="submit">Вход</button>
                                                <hr>

                                            </div>

                                            <!--Footer-->
                                            <div class="modal-footer">
                                                <div class="options">
                                                    <p>Не си регистриран? <a href="register.php">Регистрирай се!</a></p>
                                                    <p>Забравена <a href="#">парола?</a></p>
                                                </div>
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

        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- Tooltips -->
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/tether.min.js"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?= DIRPUBLIC; ?>js/bootstrap.min.js"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="public/js/mdb.min.js"></script>
        <script type="text/javascript" src="public/login.js"></script>
        <script>
            new WOW().init();
        </script>


    </body>

</html>