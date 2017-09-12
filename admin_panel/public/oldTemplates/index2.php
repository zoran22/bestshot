<?php require_once 'public/partials/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Административен панел</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php /* @var $data['commentService'] Service\CommentService */ ?>
                            <div class="huge"><?= $data['commentService']->getNumber(); ?></div>
                            <div>Нови коментари!</div>
                        </div>
                    </div>
                </div>
                <a href="<?= DIRADMINPANEL; ?>comments.php">
                    <div class="panel-footer">
                        <span class="pull-left">Виж детайли</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>





        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Напишете вашето съобщение тук..." />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="btn-chat">
                        Изпрати
                    </button>
                </span>
            </div>
        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
</div>
<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<!--</div>-->
<!-- /#page-wrapper -->

<!--</div>-->
<!-- /#wrapper -->

<!-- jQuery -->
<script src="./vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="./vendor/raphael/raphael.min.js"></script>
<!--<script src="./vendor/morrisjs/morris.min.js"></script>
<script src="./data/morris-data.js"></script>-->

<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>