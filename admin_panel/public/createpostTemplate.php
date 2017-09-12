<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>bestshot- фото портал</title>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
        <link href="<?= DIRPUBLIC; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Material Design Bootstrap -->
        <!--<link href="css/mdb.min.css" rel="stylesheet">-->
        <link href="<?= DIRPUBLIC; ?>css/mdb430.min.css" rel="stylesheet" type="text/css"/>
        <!-- Template styles -->
        <link href="<?= DIRPUBLIC; ?>css/style.css" rel="stylesheet" type="text/css"/>


        <style>
            #bodyContent {
                height: 8rem;
            }
            .jumbotron{
                margin-top: 5rem;
            }


            /*    form{
                    background-color:#fff
                   
                }*/
            /*    #maindiv{
                    width:960px;
                    margin:10px auto;
                    padding:10px;
                    font-family:'Droid Sans',sans-serif
                }
            */        #formdiv{
                width:500px;
                /*        float:left;*/
                text-align:center
            }
            /*    form{
                    padding:40px 20px;
                    box-shadow:0 0 10px;
                    border-radius:2px
                }*/
            .navbar {
                background-color: #304a74;

            }
            h2{
                margin-left:30px
            }
            .upload{
                background-color:#4285F4;
                /*border:1px solid blue;*/
                color:#fff;
                /*border-radius:1px;*/
                padding:10px;
                /*text-shadow:1px 1px 0 green;*/
                /*box-shadow:2px 2px 15px rgba(0,0,0,.75)*/
            }
            .upload:hover{
                cursor:pointer;
                /*                background:#0082CA;*/
                /*        border:1px solid #c20b0b;*/
                box-shadow:0 0 5px rgba(0,0,0,.75)
            }
            #file{
                color:green;
                padding:5px;
                border:1px dashed #123456;
                background-color:#f9ffe5
            }
            #upload{
                margin-left:45px
            }
            #noerror{
                color:green;
                text-align:left
            }
            #error{
                color:red;
                text-align:left
            }
            #img{
                width:35px;
                border:none;
                height:35px;
                margin-left:-20px;
                margin-bottom:91px
            }
            .abcd{
                text-align:center;
                display: inline-flex
            }
            .abcd img{
                height:100px;
                width:100px;
                padding:5px;
                border:1px solid #e8debd
            }
            b{
                color:red
            }
            .clearfix:after {
                visibility: hidden;
                display: block;
                font-size: 0;
                content: " ";
                clear: both;
                height: 0;
            }
            /*            #filediv{
                            position: relative;
                            display: inline-block;
                            width: 100px;
                        }*/
            .clearfix { display: inline-block; }
            /* start commented backslash hack \*/
            * html .clearfix { height: 1%; }
            .clearfix { display: block; }
            /* close commented backslash hack */
        </style>
    </head>
    <body>

        <!--Navbar-->
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
                            <a href="<?= DIR; ?>gallery.php" class="nav-link">Галерия</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Блог</a>
                        </li>

                    </ul>


                    <div >


                        <!--<a href="" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <form class="form-inline waves-effect waves-light search-box">
                            <input id="search" name="search" type="text" class="form-control" autocomplete="false" placeholder="Търсене">

                            <!--</a>-->

                        </form>
                        <div id="content" class="list-group" style="position:absolute"></div>

                    </div>


                    <ul id="forms" class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <?php
                            /* @var $data['user'] \Data\User */

                            if (isset($_SESSION['user_name'])):
                                $userProfileImg = $data['user']->getProfile_pic();
                                // First check if there is a profile picture filename assoiated with the user
                                if ($userProfileImg === null) {
                                    $userImg = DIRPROFILEIMAGES . 'profile.jpg';
                                    // If there's a filename associated, then check if the file really exists on the server
                                } elseif (file_exists(DIRPROFILEIMG . $userProfileImg)) {
                                    $userImg = DIRPROFILEIMAGES . $userProfileImg;
                                }

                                ?>
                                <div class="btn-group">
                                <!--<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="img-fluid rounded-circle" width="30" height="30" style="display:inline"> Admin</button>-->
                                    <a id="profile_pic" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $userImg; ?>" class="img-fluid rounded-circle z-depth-0"  style="display:inline" width="35" height="35"> <?= $data['user']->getName(); ?></a>
                                    <div class="dropdown-menu">

                                        <?php if ($_SESSION['role_id'] === '1'): ?>
                                            <a class="dropdown-item" href="<?= DIRADMINPANEL; ?>"><i class="fa fa-desktop" aria-hidden="true"> </i> Админстративен Панел</a>
                                        <?php endif; ?>
                                        <a class="dropdown-item shades" href="<?= DIRADMINPANEL; ?>createpost.php"><i class="fa fa-pencil" aria-hidden="true"> </i> Създай нов пост</a>
                                        <a class="dropdown-item" href="users.php"><i class="fa fa-user" aria-hidden="true"> </i> Редактирай профила си</a>
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
            <!--            <div id="content" class="list-group">

                        </div>-->
        </nav>
        <!--/.Navbar-->
        <div class="container">
            <div class="jumbotron">

                <h3 class="display-4">Създай нов пост</h3>
                <!-- comment $user->messages -->
                <form action="" id="form-create-post" method="POST" enctype="multipart/form-data" novalidate>

                    <!-- TITLE -->
                    <div class="form-group">
                        <label for="title" class="text-fluid">Заглавие:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Заглавие">

                    </div>
                    <!-- Body Content -->
                    <div class="form-group">
                        <label for="bodyContent" class="text-fluid">Съдържание на статията:</label>
                        <textarea class="form-control" id="bodyContent" name="bodyContent" rows="5" cols="5"></textarea>
                    </div>
                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug" class="text-fluid">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="novo-zaglavie">
                        <small id="fileHelp" class="form-text text-muted">Препоръчваме името на slug да бъде същото като на статията, да се използва английската азбука. Ако е повече от една дума, използвайте за разделител '-'. (без празни пространства)!</small>
                    </div>
                    <!--                     Category Seletct
                                        <div class="form-group">
                                            <label for="exampleSelect2" class="text-fluid">Избор на примери</label>
                                            <select multiple class="form-control" id="exampleSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>-->
                    <!-- Head Image  -->
                    <div class="form-group">
                        <label for="head_image">Главно изображение:</label>
                        <input name="head_image" type="file" class="form-control-file" id="head_image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Главно изображение. Само JPEG,PNG,JPG  формат.  Размерът на изображението трябва да е по-малък от 2MB.</small>
                    </div>

                    <div class="form-group">
                        <div class="form-control">
                            <div id="maindiv ">
                                <div id="formdiv">
                                    <div id="filediv">
                                        <input name="file[]" type="file" id="file"/>
                                    </div>
                                    <input type="button" id="add_more" class="upload" value="Избери нов файл"/>
                                    <small  id="fileHelp" class="form-text text-muted">Само JPEG,PNG,JPG формат. Размерът трябва да е по-малък от 2MB.</small>
                                </div>
                            </div>
                        </div> <!-- Form control -->
                    </div>
                    <div class="form-control"><button type="submit" name="submit" class="btn btn-primary" value="Създай нов пост">Създай нов пост</button></div>

                </form>
            </div>
        </div>



        <!-- SCRIPTS -->

        <!-- JQuery -->
        <!--<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>-->
        <script src="<?= DIRPUBLIC; ?>js/jquery-2.2.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap tooltips -->
        <!--<script type="text/javascript" src="js/tether.min.js"></script>-->
        <script src="<?= DIRPUBLIC; ?>js/tether.js" type="text/javascript"></script>
        <!-- Bootstrap core JavaScript -->
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
        <script src="<?= DIRPUBLIC; ?>js/bootstrap.js" type="text/javascript"></script>
        <!-- MDB core JavaScript -->
        <!--<script type="text/javascript" src="js/mdb.min.js"></script>-->
        <script src="<?= DIRPUBLIC; ?>js/mdb.js" type="text/javascript"></script>
        <script src="<?= DIRADMINPANEL; ?>new_post/script.js" type="text/javascript"></script>

    </body>
</html>