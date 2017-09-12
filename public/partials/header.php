<!DOCTYPE html>
<html lang="bg">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>bestShot-фото портал</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= DIRPUBLIC; ?>img/favicon.ico">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

        <!-- Bootstrap core CSS -->
        <link href="<?= DIRPUBLIC; ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="<?= DIRPUBLIC; ?>css/mdb430.min.css" rel="stylesheet">
        <!-- Template styles -->
        <?php if (isset($_GET['p']) || $_SERVER['SCRIPT_NAME'] === '/profile.php'): ?>
        <!--Gallery-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />

                <!--Rating stars in comment-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
                <link href="<?= DIRPUBLIC; ?>css/postsingle.css" rel="stylesheet">
            <?php else: ?>
                <link href="<?= DIRPUBLIC; ?>css/style.css" rel="stylesheet">
            <?php endif; ?>
            <style>

            #button{
                height:63px;
                margin-left:45%;
                margin-top:6%;
            }

        </style>

    </head>

    <body>


        <!--Navbar-->
        <!--<nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">-->
        <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= DIR; ?>">
                    <img src="<?= DIR; ?>public/img/logo6.png" alt="bestshot logo" height="40" width="160">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link">Начало <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Новини</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= DIRPUBLIC; ?>gallery.html" class="nav-link">Галерия</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Блог</a>
                        </li>

                    </ul>

                    <div >
                        <form class="form-inline waves-effect waves-light search-box">
                            <input id="search" name="search" type="text" class="form-control" autocomplete="false" placeholder="Търсене">
                        </form>
                        <div id="content" class="list-group" style="position:absolute"></div>
                    </div>


                    <ul id="forms" class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <?php
                            /* @var $data['user'] \Data\User */

                            if (isset($_SESSION['user_name'])):
                                // First get value null/path of the profile pic
                                $userProfileImg = $data['user']->getProfile_pic();
                                // $userProfileImg = $_SESSION['profile_pic'];
                                // Second, check if there is a profile picture filename assoiated with the user
                                if ($userProfileImg === null) {
                                    // if there's not, assign dummy profile pic
                                    $userImg = DIRPROFILEIMAGES . 'profile.jpg';
                                    // If there's a filename associated, then check if the file really exists on the server
                                } elseif (file_exists(DIRPROFILEIMG . $userProfileImg)) {
                                    $userImg = DIRPROFILEIMAGES . $userProfileImg;
                                }
                                ?>
                            <div class="btn-group">
                                                    <!--<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle" width="30" height="30" style="display:inline"> Admin</button>-->
                                    <a id="profile_pic" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= $userImg; ?>" class=" z-depth-0"  style="display: inline; border-radius: 50% " width="35" height="35"> 
                                            <span id="navUserName"><?= $data['user']->getName(); ?></span>   
                                        </a>
                                        <div class="dropdown-menu">

                                            <?php if ($_SESSION['role_id'] === '1'): ?>
                                                <a class="dropdown-item" href="<?= DIRADMINPANEL; ?>"><i class="fa fa-desktop" aria-hidden="true"> </i> Админстративен Панел</a>
                                            <?php endif; ?>
                                            <a class="dropdown-item shades" href="<?= DIRADMINPANEL; ?>createpost.php"><i class="fa fa-pencil" aria-hidden="true"> </i> Създай нов пост</a>
                                            <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"> </i> Редактирай профила си</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Изход</a>
                                        </div>
                                    </div>

                            <?php else: ?>
                                <!-- If the visitor is not logged -->
                                <div class="btn-group">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Моят Профил</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Вход</a>
                                        <a class="dropdown-item" href="register.php"><i class="fa fa-edit" aria-hidden="true"></i> Регистрация</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->
