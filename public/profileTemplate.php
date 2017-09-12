<?php require_once 'partials/header.php'; ?>
<?php /* @var $data['user'] \Data\User */ ?>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">-->
<!--<link href="public/css/alert.css" type="text/css" rel="stylesheet" />-->
<style>
    #app {
        margin-top: 80px;
    }

    html {
        min-height: 100%;
        /*        background: -webkit-linear-gradient(#9d9181, #9e866c);
                background: linear-gradient(#9d9181, #9e866c);*/
    }

    body {
        background-color: transparent;
        background: url("https://source.unsplash.com/random/1600x900") no-repeat center center fixed;
    }

    .jumbotron {
        margin-top: 100px;
    }


    .card-profile {
        width: 340px;
        margin: 100px auto;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 0;
        border: 0;
        box-shadow: 1em 1em 2em rgba(0, 0, 0, 0.2);
    }

    #imgInp {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    #app {
        background-color: rgba(255, 255, 255, 0.9);
    }
</style>
<div class="container">
    <!--Jumbotron-->
    <div id="app" class="jumbotron clearfix row">
        <!--Card-->
        <!--<div class="card">-->
        <div class="pull-left col-md-6">
            <div >
                <!--<form id="profilePhoto" name="profilePhoto" method="post" enctype="multipart/form-data">-->
                      <!--                    <input type='file' id="imgInp" />
            <img id="blah" src="http://via.placeholder.com/250x250" alt="your image"/>-->

                <!--Card image-->
                <label for="imgInp" class="flex-center">
                    <img id="blah" class="img-fluid center-block z-depth-1-half" src="<?= $userImg; ?>" alt="Card image cap" height="300" width="300">

                    <!--/.Card image-->
                </label>
                <input name="profile_pic" type="file" id="imgInp" />

                <!--Card content-->

                <div class="input-group flex-center">
                    <label for="imgInp" class="btn btn-outline-primary  btn-sm"><i class="fa fa-paperclip" aria-hidden="true"></i> Change</label>
                    <a  id="delProfileImage" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove" aria-hidden="true"></i> Remove</a>
                    <a id="uploadImgButton" class="btn btn-outline-success  btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>


                </div>
                <!--</form>-->
            </div>
            <!--Title-->
            <div >
                <div class="card-text text-center text-muted text-primary">Your name: </div>
                <div id="displayName" class="card-title text-center text-fluid"><?= $data['user']->getName(); ?></div>

            </div>            
            <div>
                <!--Text-->
                <div class="card-text text-center text-muted text-primary">Your Email:

                </div>
                <div id="displayEmail" class="card-text text-center text-fluid">
                    <?= $data['user']->getEmail(); ?>
                </div>

            </div> 

        </div>
        <!--/.Card-->
        <!--Form with header-->
        <div class="pull-right col-md-6">
            <div class="containter">
                <div class="row">

                    <h5 class="col-md-12 text-center">Change your name</h5>
                    <!--First column-->
                    <div class="col-md-8">
                        <div class="md-form">

                            <input type="text" name="fullName" id="fullName" class="form-control">
                            <input type="number" hidden="" id="id" value="<?= $data['user']->getId(); ?>">
                            <label for="fullname" class="">Your name</label>

                        </div>
                    </div>



                    <!--Third column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <button id="changeName" class="btn btn-primary input-group-addon">Update</button>
                        </div>
                    </div>

                </div>
                <!-- Row -->
                <!--Change Password-->
                <div class="row flex-center">
                    <h5 class="col-md-12 text-center">Change your email</h5>
                    <!--First column-->
                    <div class="col-md-8 flex-item">
                        <div class="md-form">
                            <input type="email" id="emailUpdate" class="form-control">
                            <label style="width: -webkit-fill-available;" id="emailLabel" for="emailUpdate" data-error="wrong" data-success="Looks alright!" class="">Your email</label>
                        </div>
                    </div>



                    <!--Third column-->
                    <div class="col-md-4 flex-item">
                        <div class="md-form">
                            <button id="changeEmailButton" class="btn btn-primary input-group-addon">Update</button>
                        </div>
                    </div>

                </div>
                <!-- Row -->
                <!--Change Password-->
                <div class="row flex-center">
                    <h5 class="flex-item">Change Your password</h5>

                    <!--First column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <input type="password" id="oldPass" class="form-control">
                            <label for="oldPass" class="">Current Password</label>
                        </div>
                    </div>
                    <!--First column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <input type="password" id="newPass" class="form-control">
                            <label for="newPass" class="">New Password</label>
                        </div>
                    </div>

                    <!--Second column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <input type="password" id="repeatNewPass" class="form-control">
                            <label for="repeatNewPass" class="">Repeat password</label>
                        </div>
                    </div>

                    <!--Third column-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <button id="changePassBtn" class="btn btn-primary input-group-addon">Update</button>
                        </div>
                    </div>

                </div>
                <!-- Row -->

                <div class="row ">

                    <!--Third column-->
                    <div class="col-md-12">
                        <div class="">
                            <a href="<?= DIR ?>" class="btn btn-primary btn-block">I'm done! Get me out of here!</a>
                        </div>
                    </div>

                </div>
                <!-- Row -->

            </div>

        </div>
        <!--/col-md-6 -->
        <!--/Form with header-->
        <!--<button id="test" class="btn btn-outline-danger">Test</button>-->

    </div>
    <!--/.Jumbotron-->
</div>
<input type="text"  id="userProfileImg" value="<?= $userProfileImg ?>" hidden="">






<!-- SCRIPTS -->
<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyCaZNFLPSz59pBTmlaX6dbhAe5iTCwSVeA"></script>-->
<!-- JQuery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= DIRPUBLIC; ?>js/tether.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= DIRPUBLIC; ?>js/bootstrap.min.js"></script>
<script src="<?= DIRPUBLIC; ?>js/jquery.validate.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= DIRPUBLIC; ?>js/mdb.min.js"></script>

<script type="text/javascript" src="<?= DIRPUBLIC; ?>js/contact.js"></script>

<script src="public/js/xl-toast.js" type="text/javascript"></script>

<script src="<?= DIRPUBLIC; ?>js/search.js" type="text/javascript"></script>
<script>
    new WOW().init();
</script>
<script>
    //    var app = new Vue({
    //        el: '#app',
    //        data: {
    //            name: 'test'
    //        }
    //
    //    });
    $(document).ready(function () {
        $('#test').click(function (e) {
            e.preventDefault();
            $.toast({
                title: '<strong>Well done!</strong> You have successfully changer your name',
                position: 'top',
                backgroundColor: 'rgba(0, 200, 81, 0.7)',
                duration: 15000,
                width: 'auto',
                height: '50px',
                lineheight: '45px',
                fontsize: '15px'
            });
        });
       
        $('body').on('click', '#toast-div', function () {
            $('#toast-div').remove();
        });

        $('body').on('mouseenter', '#toast-div', function () {
            $('#toast-content').css({
                'background-color': 'rgba(0, 200, 81, .9)',
                'cursor': 'pointer'
            });
        });
        $('body').on('mouseleave', '#toast-div', function () {
            $('#toast-content').css('background-color', 'rgba(0, 200, 81, 0.7)');
        });

       
        // Image preview before upload
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        // Change name
        $('#changeName').on('click', function (e) {
            e.preventDefault();
            var name = document.getElementById('fullName').value;
            var id = document.getElementById('id').value;
            $.post("editProfile.php", {
                name: name,
                id: id
            },
                    function (data) {
                        $('#displayName, #navUserName').text(data.name);

                        $.toast({
                            title: 'Well done! You name was changed to <strong>' + data.name + '</strong>',
                            position: 'top',
                            backgroundColor: 'rgba(0, 200, 81, 0.7)',
                            duration: 5000,
                            width: 'auto',
                            height: '50px',
                            lineheight: '45px',
                            fontsize: '15px'
                        });
                    }, "json");
        });

        // Change email
        $('#changeEmailButton').on('click', function (e) {
            e.preventDefault();
            var name = document.getElementById('emailUpdate').value;
            var id = document.getElementById('id').value;
            $.post("editProfile.php", {
                email: name,
                id: id
            },
                    function (data) {
                        $('#displayEmail').text(data.name);

                        $.toast({
                            title: 'Well done! You email was changed to <strong>\'' + data.name +
                                    '\'</strong>',
                            position: 'top',
                            backgroundColor: 'rgba(0, 200, 81, 0.7)',
                            duration: 5000,
                            width: 'auto',
                            height: '50px',
                            lineheight: '45px',
                            fontsize: '15px'
                        });
                    }, "json");
        });

        $('#emailUpdate').on('keyup', function () {
            if ($('#emailUpdate').hasClass("invalid")) {
                $('#emailUpdate').removeClass("invalid");
//                 $('#changeEmailButton').removeAttr("disabled");
                $("#changeEmailButton").removeAttr("disabled");
            }
            //        $('div#content').empty();
            var searchKeyword = $(this).val();

            $('#emailLabel').text('Your email!');
            if (searchKeyword.length >= 8) {
                $.post('editProfile.php', {
                    keywords: searchKeyword
                }, function (data) {
                    //$('div#content').empty();
                    //                    $.toast({title: data.name + ' is already registered!'});
                    $('#emailUpdate').addClass("invalid");
                    $('#emailLabel').attr('data-error', data.name +
                            ' already exists in our database!');
                    $('#changeEmailButton').attr("disabled", true);

                }, "json");
            }
        });
        // End Change Email
        // Change name
        $('#changePassBtn').on('click', function (e) {
            e.preventDefault();
            var oldPass = document.getElementById('oldPass').value;
            var newPass = document.getElementById('newPass').value;
            var repeatNewPass = document.getElementById('repeatNewPass').value;
            var id = document.getElementById('id').value;
            $.post("editProfile.php", {
                change_pass: 'change',
                oldPass: oldPass,
                newPass: newPass,
                repeatNewPass: repeatNewPass,
                id: id
            },
                    function (data) {
                        // data.name is only an affirmative string 'Success!'
                        $.toast({
                            title: data.name + 'You password was successfully changed',
                            position: 'top',
                            backgroundColor: 'rgba(0, 200, 81, 0.7)',
                            duration: 5000,
                            width: 'auto',
                            height: '50px',
                            lineheight: '45px',
                            fontsize: '15px'
                        });
                    }, "json");
        });

// Image file Upload
        $("#uploadImgButton").click(function (event) {
            event.preventDefault();
            event.stopPropagation();
            var file_data = $("#imgInp").prop('files')[0];
            var form_data = new FormData();
            // var form_data = new FormData(document.getElementById('profilePhoto'));
            //form_ata.append('image', $('input[type=file]')[0].files[0]);
            var id = document.getElementById('id').value;
            form_data.append('profile_pic', file_data);
            //alert(form_data);
            form_data.append('id', id);

            //console.log(form_data.profile_pic.name);



            $.ajax({
                type: "POST",
                dataType: "json",
                url: "editProfile.php",
//                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (data) {
                    $.toast({
                        title: data.success + data.message,
                        position: 'top',
                        backgroundColor: 'rgba(0, 200, 81, 0.7)',
                        duration: 10000,
                        width: 'auto',
                        height: '50px',
                        lineheight: '45px',
                        fontsize: '15px'
                    });

                }
            });
        });



        // Delete profile image
        $('#delProfileImage').on('click', function (e) {
            e.preventDefault();

            var id = document.getElementById('id').value;
            $.post("editProfile.php", {
                delImage: 'change',
                id: id
            },
                    function (data) {
                        // data.name is only an affirmative string 'Success!'
                        $.toast({
                            title: data.message,
                            position: 'top',
                            backgroundColor: 'rgba(63, 81, 181, 0.7)',
                            duration: 5000,
                            width: 'auto',
                            height: '50px',
                            lineheight: '45px',
                            fontsize: '15px'
                        });
                        $('#delProfileImage').addClass('disabled');
                    }, "json");
        });
        if ($('#userProfileImg').val() === '') {
            $('#delProfileImage').addClass('disabled');
        }

    });
</script>
</body>

</html>