<?php require_once 'partials/header.php'; ?>




<!--Navbar-->

<!--/.Navbar-->
<div class="paralax">
    <p class="text">Добре дошли в нашата галерия</p>
</div>

<div class="wrap">
    <h2 class="titles">Вдъхновениe от природата</h2>
    <!-- Define all of the tiles: -->
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/wood.jpg" alt="" onclick = "openModal();currentSlide(1)"  />
            <div class="titleBox">Горска приказка</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/glacier.jpg" alt="" onclick = "openModal();currentSlide(2)" />
            <div class="titleBox">Ледникът</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/nfff.jpg" alt="" onclick = "openModal();currentSlide(3)" />
            <div class="titleBox">На края на света</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/nature.jpg" alt="" onclick = "openModal();currentSlide(4)" />
            <div class="titleBox">Падащи листа</div>
        </div>
    </div>

    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/04.jpg" alt="" onclick = "openModal();currentSlide(5)" />
            <div class="titleBox">Отблизо</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/church.jpg" alt="" onclick = "openModal();currentSlide(6)" />
            <div class="titleBox">Пустинна църква</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/caribbean-islands.jpg" alt="" onclick = "openModal();currentSlide(7)" />
            <div class="titleBox">Карибско съкровище</div>
        </div>
    </div>

    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/abondened.jpg" alt="" onclick = "openModal();currentSlide(8)" />
            <div class="titleBox">Призрачна стая</div>
        </div>
    </div>

    <h2 class="titles">Цветен свят</h2>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/wedding.jpg" alt="" onclick = "openModal();currentSlide(9)" />
            <div class="titleBox">Незабравим залез</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/download.jpg" alt="" onclick = "openModal();currentSlide(10)" />
            <div class="titleBox">Муза</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/cuba.jpg" alt="" onclick = "openModal();currentSlide(11)" />
            <div class="titleBox">Куба завинаги</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/2048-12.jpg" alt="" onclick = "openModal();currentSlide(12)" />
            <div class="titleBox">Нови хоризонти</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/wedding1.jpg" alt="" onclick = "openModal();currentSlide(13)" />
            <div class="titleBox">Заедно</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/paris.jpg" alt="" onclick = "openModal();currentSlide(14)" />
            <div class="titleBox">Парижка утрин</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/mirror.jpg" alt="" onclick = "openModal();currentSlide(15)" />
            <div class="titleBox">Огледало</div>
        </div>
    </div>
    <div class="box">
        <div class="boxInner">
            <img src="img/gallery/canon.jpg" alt="" onclick = "openModal();currentSlide(16)" />
            <div class="titleBox">На лов с фотоапарат</div>
        </div>
    </div>

</div>
<div class="paralax2">
    <p class="text">“Във всяка снимка винаги присъстват поне двама: фотографът и зрителят.” - Ансел Адамс</p>
</div>
<!-- /#wrap -->
<div id="my-modal" class="modal">
    <p class="close" onclick="closeModal()">&times;</p>
    <div class="lightbox">

        <div class="content">
            <img src="img/gallery/wood.jpg" alt="" />

        </div>
        <div class="content">
            <img src="img/gallery/glacier.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/nfff.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/nature.jpg" alt="" />
        </div>

        <div class="content">
            <img src="img/gallery/04.jpg" alt="" />
        </div>

        <div class="content">
            <img src="img/gallery/church.jpg" alt="" />
        </div>

        <div class="content">
            <img src="img/gallery/caribbean-islands.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/abondened.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/wedding.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/download.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/cuba.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/2048-12.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/wedding1.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/paris.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/mirror.jpg" alt="" />
        </div>
        <div class="content">
            <img src="img/gallery/canon.jpg" alt="" />
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
</div>
<!--Footer-->
<footer class="page-footer center-on-small-only">

    <!--Footer Links-->
    <div id="gallery">
        <div class="container-fluid">
            <div class="row">

                <!--First column-->

                <hr class="hidden-md-up">

                <!--Second column-->
                <div class="col-lg-2 col-md-4 offset-lg-1">
                    <h5 class="title">Последни</h5>
                    <ul>
                        <li><a href="#!">Новини</a></li>
                        <li><a href="#!">Фотографии</a></li>
                        <li><a href="#!">Обучения</a></li>
                        <li><a href="#!">Блог</a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="hidden-md-up">

                <!--Third column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">За нашите гости и приятели </h5>
                    <ul>
                        <li><a href="#!">Пътеписи</a></li>
                        <li><a href="#!">Конкурси</a></li>
                        <li><a href="#!">Галерия</a></li>
                        <li><a href="#!">Връзка с нас</a></li>
                        <li><a href="#!">Условия за ползване</a></li>
                    </ul>
                </div>
                <!--/.Third column-->

                <hr class="hidden-md-up">

                <!--Fourth column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">Последвайте ни</h5>
                    <ul>
                        <li><a class="btn btn-social-icon btn-twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-facebook">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-social-icon btn-instagram">
                                <span class="fa fa-instagram"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.Fourth column-->

                <!--Section heading-->


                <div id="contact" class="container">
                    <form class="contact-us form-horizontal" method="post">
                        <div>Контактна форма</div>
                        <div class="control-group">
                            <label class="control-label">Име и Фамилия</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-user"></i></span>
                                    <input type="text" class="input-xlarge" name="name" placeholder="Име и Фамилия">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-envelope"></i></span>
                                    <input type="text" class="input-xlarge" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Коментар</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-pencil"></i></span>
                                    <textarea name="comment" class="span4" rows="4" cols="80" placeholder="Коментар (Макс 200 символа)"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-primary">Изпрати</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!--/First column-->

            </div>
            <!--/.Footer Links-->

            <hr>

            <!--Copyright-->
            <div class="footer-copyright">
                <div class="container-fluid">
                    © 2015 Copyright: <a href="http://bestShot.bg"> bestShot.bg </a>

                </div>
            </div>
            <!--/.Copyright-->

            </footer>
            <!--/.Footer-->


            <!-- SCRIPTS -->

            <!-- JQuery -->
            <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/tether.min.js"></script>

            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>

            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="js/mdb.min.js"></script>
            <script type="text/javascript" src="js/gallery.js"></script>

            </body>

            </html>