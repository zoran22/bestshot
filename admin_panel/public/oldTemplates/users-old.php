<!--<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>bestShot- таблици</title>

         Bootstrap Core CSS
        <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

         MetisMenu CSS
        <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

         Custom CSS
        <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

         Morris Charts CSS
        <link href="./vendor/morrisjs/morris.css" rel="stylesheet">

         Custom Fonts
        <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
         WARNING: Respond.js doesn't work if you view the page via file://
        [if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]
        <style>

            .btn-circle {
                border-radius: 50%;
            }
            #img{
                width:100px;
                height:100px;}
            @media only screen and (max-width: 800px) {

                /* Force table to not be like tables anymore */
                .no-more-tables table,
                .no-more-tables thead,
                .no-more-tables tbody,
                .no-more-tables th,
                .no-more-tables td,
                .no-more-tables tr {
                    display: block;
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                .no-more-tables thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                .no-more-tables tr { border: 1px solid #ccc; }

                .no-more-tables td {
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                    white-space: normal;
                    text-align:left;
                }

                .no-more-tables td:before {
                    /* Now like a table header */
                    position: absolute;
                    /* Top/left values mimic padding */
                    top: 6px;
                    left: 6px;
                    width: 45%;
                    padding-right: 10px;
                    white-space: nowrap;
                    text-align:left;
                    font-weight: bold;
                }

                /*
                Label the data
                */
                .no-more-tables td:before { content: attr(data-title); }
                #img{
                    width:150px;
                    height:150px;}
                </style>
            </head>

            <body>

                <div id="wrapper">

                 Navigation
                <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">Здравей, админ!</a>
                    </div>
                     /.navbar-header

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Теодора Христова </strong>
                                            <span class="pull-right text-muted">
                                                <em>вчера</em>
                                            </span>
                                        </div>
                                        <div>тра-ла-ла...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Милена Николова</strong>
                                            <span class="pull-right text-muted">
                                                <em>Вчера</em>
                                            </span>
                                        </div>
                                        <div>тра-ла-ла</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>Николай Христов</strong>
                                            <span class="pull-right text-muted">
                                                <em>Вчера</em>
                                            </span>
                                        </div>
                                        <div>тра-ла-ла</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Прочети всички съобщения</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                             /.dropdown-messages
                        </li>
                         /.dropdown
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Задача1</strong>
                                                <span class="pull-right text-muted">40% завършена</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% завършена</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Задача 2</strong>
                                                <span class="pull-right text-muted">20% завършена</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                    <span class="sr-only">20% завършена</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Задача 3</strong>
                                                <span class="pull-right text-muted">60% завършена</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% завършена</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p>
                                                <strong>Задача 4</strong>
                                                <span class="pull-right text-muted">80% завършена</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% завършена</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Виж всички задачи</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                             /.dropdown-tasks
                        </li>
                         /.dropdown
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-comment fa-fw"></i> Нови коментари
                                            <span class="pull-right text-muted small">Преди 4 мин</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 нови последователя
                                            <span class="pull-right text-muted small">Преди 12 мин</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> Изпратено съобщение
                                            <span class="pull-right text-muted small">Преди 4 мин</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i>Рестартиране на сървъра
                                            <span class="pull-right text-muted small">Преди 4 мин</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Виж всички предупреждения</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                             /.dropdown-alerts
                        </li>
                         /.dropdown
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> Профил</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Настройки</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Изход</a>
                                </li>
                            </ul>
                             /.dropdown-user
                        </li>
                         /.dropdown
                    </ul>
                     /.navbar-top-links

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Търсене...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                     /input-group
                                </li>
                                <li>
                                    <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Панел</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i> Таблици<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="morris.html">Таблица статии</a>
                                        </li>
                                        <li>
                                        <li>
                                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Страници<span class="fa arrow"></span></a>
                                            <ul class="nav nav-second-level">
                                                <li>
                                                    <a href="blank.html">Начало</a>
                                                </li>
                                                <li>
                                                    <a href="login.html">Вход</a>
                                                </li>
                                                <li>
                                                    <a href="#">Таблици</a>
                                                </li>
                                            </ul>
                                             /.nav-second-level
                                        </li>
                                    </ul>
                            </ul>  Side menu
                        </div>
                    </div>
                     /.sidebar-collapse

                     /.navbar-static-side
                </nav>-->
<?php require_once 'public/partials/header.php'; ?>
<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">-->
<div>
    <a href="createpost.php" class="btn btn-primary btn-block">Създай нов пост </a>
</div>
<div id="page-wrapper" >
    <table id="table" class="table table-striped no-more-tables" >
        <thead>
            <tr>
                <th>#</th>
                <th >Профилна снимка</th>
                <th>Роля</th>
                <th>Име</th>
                <th>email</th>
                <th>Създадено на</th>
                <th>Обновено на</th>
                <th>Разгледай</th>
                <th>Напрaви админ</th>

                <th>Изтрий</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /* @var $data Service\UserService */
            /* @var $member Data\User */
            foreach ($data->getUsers() as $member):

                ?>
                <?php
                // $userId = filter_var($member['id'], FILTER_VALIDATE_INT);
                // $role_id = htmlspecialchars(addslashes($member['role_id']));
                $userId = $member->getId();
                $userEmail = $member->getEmail();
                $role_id = $member->getRole_id();


                if ($role_id === '1') {
                    $role_name = 'Administrator';
                    $change_role = 'Make normal';
                } else {
                    $role_name = 'Normal User';
                    $change_role = 'Make Admin';
                }

                ?>
                <tr>
                    <th scope = "row"><?= $member->getId(); ?></th>
                    <td id = "img"><img src = "public/images/profile.jpg" class = "img-responsive"></td>

                    <td><?= $role_name; ?></td>
                    <td><?= $member->getName(); ?></td>
                    <td><?= $member->getEmail(); ?></td>
                    <td><?= $member->getCreated_at(); ?></td>
                    <td><?= $member->getUpdated_at(); ?></td>
                    <td><a href="<?= DIR; ?>single.php?" class = "btn btn-success btn-circle"><span class = "glyphicon glyphicon-eye-open" title="разгледай"></span></a>
                    <td><a href="javascript:changeRole(<?php echo "'" . $userId . "', '" . $userEmail . "', '" . $change_role . "', '" . $role_id . "'"; ?>)" class = "btn btn-primary btn-circle"><span class = "glyphicon glyphicon-plus" title="направи админ"></span></a>

                    <td><a href="javascript:delUser(<?php echo "'" . $userId . "', '" . $userEmail . "'" ?>)" class = "btn btn-danger btn-circle" title="изтрий"><span class = "glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <nav aria-label = "...">
        <ul class = "pager">
            <li><a href = "#">Предишна</a></li>
            <li><a href = "#">Следваща</a></li>
        </ul>
    </nav>
</div>

</div>

<!--/#wrapper -->

<!--jQuery -->
<script src = "./vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="./vendor/raphael/raphael.min.js"></script>
<!--<script src="./vendor/morrisjs/morris.min.js"></script>-->
<!--<script src="./data/morris-data.js"></script>-->
<!-- Toggle on/off button -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>
<script>
    //new WOW().init();
    function delUser(id, title)
    {
        if (confirm("Are you sure you want to delete ' " + title + "'?")) {
            window.location.href = '<?= DIRADMIN; ?>' + 'users.php?deluser=' + id;
        }
    }
    ;
    function changeRole(id, title, role_name, role_id)
    {
        if (confirm("Are you sure you want to " + role_name + " '" + title + "'?")) {
            window.location.href = 'users.php?changerole=' + id + '&role_id=' + role_id;
        }
    }
    ;

    //        $('a.btn-effect').mouseover(function () {
    //            $(this).addClass('btn ');
    //        });
    //        $('a.btn-effect').mouseleave(function () {
    //            $(this).removeClass('btn navbar');
    //        });

</script>

</body>

</html>