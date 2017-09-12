<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Material Design Bootstrap</title>
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
        <!-- Gallery Animations -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
        <!-- Template styles -->
        <link href="<?= DIRPUBLIC; ?>css/style.css" rel="stylesheet" type="text/css"/>


        <style>
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
                background-color: #0082CA;

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

            #gallery-preview{

                padding: 0.5rem;
            }
            img {
                display: inline-block;
                max-width: 100%;
                height: auto;
            }
            #bodyContent{
                height: 8rem;
            }
        </style>
    </head>
    <body>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?= DIRPUBLIC; ?>img/logo6.png">
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
                            <a class="nav-link">Галерия</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link">Блог</a>
                        </li>


                    </ul>

                    <form class="form-inline waves-effect waves-light">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>

                    <ul id="forms" class="navbar-nav mr-auto">

                        <li>
                            <div class="btn-group">
                                <button class="btn btn-default btn-md dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user_email']; ?></button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="createpost.php"><i class="fa fa-pencil" aria-hidden="true"></i> Create New Post</a>
                                    <a class="dropdown-item" href="#">List all users</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->
        <div class="container">
            <div class="jumbotron">

                <h3 class="display-4">Edit Post</h3>
                <!-- comment $user->messages -->
                <form action="" id="form-create-post" method="POST" enctype="multipart/form-data" novalidate>
                    <?php
                    /* @var $data Data\Post */

                    ?>
                    <!-- TITLE -->
                    <div class="form-group">
                        <label for="title" class="text-fluid">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $data['postService']->getTitle(); ?>">

                    </div>
                    <!-- Body Content -->
                    <div class="form-group">
                        <label for="bodyContent" class="text-fluid">Example textarea</label>
                        <textarea class="form-control" id="bodyContent" name="bodyContent" rows="10" cols="5"><?= $data['postService']->getBody(); ?></textarea>
                    </div>
                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug" class="text-fluid">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $data['postService']->getSlug(); ?>">
                        <small id="fileHelp" class="form-text text-muted">We recommend naming the slug same as title, only in english alphabet. If more than one word connect them with '-'. (no empty spaces)!</small>
                    </div>

                    <!-- Head Image  -->
                    <div class="form-group">
                        <label  class="text-fluid" for="head_image">Head Image:</label>
                        <div>

                            <div style="display: inline-block">
                                <a  data-fancybox="head" href="<?= DIRHEADIMG . $data['postService']->getHead_image(); ?>">

                                    <img width="100" height="100" src="<?= DIRHEADIMG . $data['postService']->getHead_image(); ?>">

                                </a>

                                <a href="editpage.php?del=<?= $data['postService']->getHead_image(); ?>&slug=<?= $data['postService']->getSlug() ?>&tab=head" class="btn btn-danger btn-sm btn-block"><i class="fa fa-times"></i></a>
                            </div>

                        </div>
                        <br/>

                        <input name="head_image" type="file" class="form-control-file" id="head_image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Header Image. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 2MB.</small>
                    </div>

                    <div class="form-group">
                        <div class="form-control">
                            <label  class="text-fluid" for="file">Gallery:</label>
                            <!-- Gallery -->
                            <div id="gallery-preview">
                                <?php for ($image = 0; $image < count($data['gallery']); $image++): ?>
                                    <div style="display: inline-block">
                                        <a data-fancybox="gallery" href="<?= DIRGALLERY . $data['gallery'][$image]; ?>">

                                            <img width="100" height="100" src="<?= DIRGALLERY . $data['gallery'][$image]; ?>"></a>

                                        <a href="editpage.php?del=<?= $data['gallery'][$image]; ?>&slug=<?= $data['postService']->getSlug() ?>&tab=gall" style="display:block"  class="btn btn-danger btn-sm btn-block"><i class="fa fa-times"></i></a>

                                    </div>

                                <?php endfor; ?>
                            </div>
                            <br/>

                            <div id="maindiv ">
                                <div id="formdiv">
                                    <div id="filediv">
                                        <input name="file[]" type="file" id="file"/>
                                    </div>
                                    <br>
                                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                    <small  id="fileHelp" class="form-text text-muted">Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 2MB.</small>
                                </div>
                            </div>
                        </div> <!-- Form control -->
                    </div>
                    <div class="form-control"><button type="submit" name="submit" class="btn btn-primary" value="Create New Post">Create New Post</button></div>

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
        <!-- Gallery animations -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script>


        </script>
    </body>
</html>

