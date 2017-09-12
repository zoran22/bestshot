<?php require_once 'public/partials/header.php'; ?>
<div id="page-wrapper" class="container-fluid">
    <h2 class="text-center">Потребители</h2>
    <table id="table" class="table table-striped no-more-tables table-responsive" >
        <thead>
            <tr>
                <th>#</th>
                <th>Профилна снимка</th>
                <th>Роля</th>
                <th>Име</th>
                <th>email</th>
                <th>Създадено</th>
                <th>Обновено</th>
                <th></th>
                <th></th>
                <th></th>
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

                
                // Profile picture
                if ($member->getProfile_pic() === null) {
                    $userPhoto = DIRPROFILEIMAGES . 'profile.jpg';
                } else {
                    $userPhoto = DIRPROFILEIMAGES . $member->getProfile_pic();
                }


                if ($role_id === '1') {
                    $role_name = 'Администратор';
                    $change_role = 'Make Normal';
                    $change_role_bg = 'Направи Обикновен Потребител';
                } else {
                    $role_name = 'Нормален Потребител';
                    $change_role = 'Make Adminstrator';
                    $change_role_bg = 'Направи Администратор';
                }

                ?>
                <tr>
                    <th scope = "row"><?= $member->getId(); ?></th>
                    <td id="img"><img src="<?= $userPhoto; ?>" class="img-circle" height="80" width="80"></td>

                    <td><?= $role_name; ?></td>
                    <td><?= $member->getName(); ?></td>
                    <td><?= $member->getEmail(); ?></td>
                    <td><?= $member->getCreated_at(); ?></td>
                    <td><?= $member->getUpdated_at(); ?></td>
                    <td><a href="<?= DIR; ?>single.php?" class = "btn btn-success btn-circle"><span class = "glyphicon glyphicon-eye-open"></span></a></td>
                    <td>
                        <a href="javascript:changeRole('<?= $userId; ?>', '<?= $userEmail; ?>', '<?= $change_role; ?>', '<?= $role_id; ?>')" class="switch" title="<?= $change_role_bg; ?>">
                            <input id="check" type="checkbox" <?php
                            if ($role_id === '1') {
                                echo 'checked';
                            }

                            ?>
                                   >
                            <div class="slider round"></div>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:delUser(<?php echo "'" . $userId . "', '" . $userEmail . "'" ?>)" class="btn btn-danger btn-circle" title="Изтрий"><span class = "glyphicon glyphicon-trash"></span></a>
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

<!--/#wrapper -->

<!--jQuery -->
<script src = "./vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./vendor/metisMenu/metisMenu.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>
<script>
    //new WOW().init();
    function delUser(id, title)
    {
        if (confirm("Are you sure you want to delete ' " + title + "'?")) {
            window.location.href = '<?= DIRADMINPANEL; ?>' + 'users.php?deluser=' + id;
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

   
</script>

</body>

</html>