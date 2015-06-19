<?php
error_reporting(0);
session_start();
include 'fungsi.php';
if($_SESSION[tipe]=='Dosen' or $_SESSION[tipe]=='Mahasiswa' OR $_SESSION[tipe]=='Admin'){
connect();
$bu=  query("select * from kategori");
?>
<!DOCTYPE html>
<html 
    <head>
        <title><?php echo $_SESSION[tipe]?> || Lihat Buku</title>
        <?php include 'style.php'; ?>
        <link rel="stylesheet" type="text/css" href="asset/material/css/materialize.css" media="screen,projection">
        <style>
            .panco-nav {
                font-size: 16px;
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
            
            .ll {
               padding-left: 5px;
               padding-right: 5px;
            }
            .profil {
                padding: 4px 4px 4px 4px;
            }
            @media only screen and (max-width: 992px){
                .se {
                    display: none;
                   
                }
            }
            @media only screen and (max-width: 1158px){
                .se {
                   font-size: 14px ;
                   
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
            body > div > div.col.s3 > div > div.card-content > div > img{
                width: 150px;
                float: left;
                padding-top: 100px;
                padding-left: 10px;
                box-shadow: 0px 0px 2px 0px;
            }
        </style>
    </head>
    
    <body>
    <!-- Navigasi -->
    <?php 
    include 'nav.php';
    ?>
        <div class="row">
    <div id="scroll-wrap" class="container">
        <div class="main">
            
            <div id="bookshelf" class="bookshelf">
                 <?php 
                 while($lp=  mysql_fetch_array($bu)) { 
                     $nama=$lp[nama];
                     if($nama=='Buku'){
                        $lp[cover]='buku.jpg';
                        $link='view_buku.vanray';
                        }
                     elseif ($nama=='Tugas Akhir') {
                            $lp[cover]='ta.jpg';
                            $link='view_ta.vanray';
                        }
                     elseif ($nama=='Kerja Praktek') {
                            $lp[cover]='kp.jpg';
                            $link='view_kp.vanray';
                        }
                     elseif ($nama=='Program Profesional') {
                            $lp[cover]='pp.jpg'; 
                            $link='view_pp.vanray';
                        }
                     
                     ?>  
                <style>
                    .no-csstransforms3d .book[data-book="book-<?php echo $lp[idkategori]?>"],
                    .no-js .book[data-book="book-<?php echo $lp[idkategori]?>"],
                    .book[data-book="book-<?php echo $lp[idkategori]?>"] .front {
                        background: url(gambar/<?php echo $lp[cover]?>);
                        background-attachment: fixed;
                        background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.1) 0%, rgba(211, 211, 211, 0.1) 5%, rgba(255, 255, 255, 0.15) 5%, rgba(255, 255, 255, 0.1) 9%, rgba(0, 0, 0, 0.01) 100%), url(gambar/<?php echo $lp[cover]?>), #009bdb;
                        background: linear-gradient(to right, rgba(0, 0, 0, 0.1) 0%, rgba(211, 211, 211, 0.1) 5%, rgba(255, 255, 255, 0.15) 5%, rgba(255, 255, 255, 0.1) 9%, rgba(0, 0, 0, 0.01) 100%), url(gambar/<?php echo $lp[cover]?>), #009bdb;
                    }
                    
                    .book[data-book="book-<?php echo $lp[idkategori]?>"] .inner { border-color: #009bdb }
                    .book[data-book="book-<?php echo $lp[idkategori]?>"] .cover::before {
                        background: url(gambar/<?php echo $lp[cover]?>);
                        background: -webkit-linear-gradient(left, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url(gambar/<?php echo $lp[cover]?>), #009bdb;
                        background: linear-gradient(to right, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url(gambar/<?php echo $lp[cover]?>), #009bdb;
                    }
                </style>
                
                <figure>
                    <div class="book z-depth-5" data-book="book-<?php echo $lp[idkategori]?>"></div>
                    <div class="buttons"><a title="Status Buku di Perpustakaan" href="<?php echo $link ?>">OPEN</a><a href="<?php echo $link ?>"></a></div>
                    <figcaption><h2><?php echo $lp[nama] ?> <span><?php echo $lp[pengarang] ?></span></h2></figcaption>
                    <div class="details">
                        <ul>
                            <li><?php echo $lp[sinapsis] ?></li>
                            <li>Kode Buku : <?php echo $lp[kodebuku]?></li>
                            <li>Penerbit  : <?php echo $lp[penerbit]?></li>
                            <li>Tahun Terbit  : <?php echo $lp[tahun]?></li>
                        </ul>
                    </div>
                </figure>
                 <?php } ?>
                 
            </div></div><!-- /main -->
        
    </div><!-- /container -->
       </div>
    <script type="text/javascript" src="asset/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="asset/material/js/materialize.js"></script>
    <script>  $(".button-collapse").sideNav(); </script>
    <script>
        $(document).ready(function(){
            $('.dropdown').dropdown();
        });
        
    </script>

       <?php include 'js.php'; ?>
    </body>

</html> <?php
} else {
    header('location:index.php');
} 