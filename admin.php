<?php
error_reporting(0);
session_start();
include 'fungsi.php';
if ($_SESSION[tipe] == 'Dosen' or $_SESSION[tipe] == 'Mahasiswa' OR $_SESSION[tipe] == 'Admin') {
    ?>
    <!DOCTYPE html>
    <html 
        <head>

            <title>Dashboard Admin</title>

    <?php include 'cssadmin.php'; ?>
            <style>
                .panco-nav {
                    font-size: 15px;
                    text-transform: uppercase;
                    font-family: "immi", sans-serif;
                }

                xm {
                    font-size: 13px;
                }

                .aka {
                    width: 45px;
                    padding-top: 5px;
                    margin-right: 5PX;
                }

                .se {
                    position: absolute;
                    display: initial;
                    width: 535px;
                }

                @media only screen and (max-width: 992px){
                    .se {
                        display: none;

                    }
                }
                @media only screen and (max-width: 1158px){
                    .se {
                        font-size: 13px ;

                    }
                }

                .profile-img {
                    width: 37px;
                    height: 37px;
                    border-radius: 3px;
                    float: left;
                    margin-top: 11px;
                    margin-right: 5px;
                }
                body {
                    font-family: "lato";
                }
            </style>
        </head>

        <body>
            <!-- Navigasi -->
    <?php include 'nav.php'; ?>

            <div id="buku" class="col s12">

                <?php
                $page = $_GET[halaman];
                if ($page == 'buku') {
                    include 'kelolabuku.php';
                } elseif ($page == 'akun') {
                    include 'kelolaakun.php';
                } elseif ($page == 'pinjam') {
                    include 'kelolapinjam.php';
                } elseif ($page == 'laporan') {
                    include 'kelolalaporan.php';
                } else {
                    include 'menuutama.php';
                }
                ?>
            </div>



            <script type="text/javascript" src="asset/jquery.js"></script>
            <script type="text/javascript" src="asset/material/js/materialize.js"></script>
            <script>  $(".button-collapse").sideNav();</script>
            <script>
                $(document).ready(function () {
                    $('.modal-trigger').leanModal();
                });
                $(window).load(function () {
                    $('#<?php echo $_GET[modal] ?>').leanModal();
                });

                $(document).ready(function () {
                    $('.dropdown').dropdown();
                });

                $(document).ready(function () {
                    $('ul.tabs').tabs();
                });

                $(window).scroll(function () {
                    var origin = $('.tabs-wrapper');
                    var origin_row = origin.find('.row');
                    if (origin.is(":visible")) {
                        if (origin.attr('data-origpos') === undefined) {
                            origin.attr('data-origpos', origin.position().top);
                        }
                        if ($(window).scrollTop() >= origin.attr('data-origpos') && !origin.hasClass('fixed')) {
                            origin_row.addClass('fixed');
                        }
                        if ($(window).scrollTop() < origin.attr('data-origpos')) {
                            origin_row.removeClass('fixed');
                        }
                    }
                });

            </script>
    <?php include 'js.php'; ?>
        </body>
    </html>
    <?php
} else {
    header('location:index.php');
} 