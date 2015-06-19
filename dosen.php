<?php
error_reporting(0);
session_start();
include 'fungsi.php';
$id=$_SESSION[iddosen];
if($_SESSION[tipe]=='Dosen'){
$l=$_SESSION[iddosen];
$cs=  query("SELECT * FROM dosen WHERE nama IS NOT NULL AND nip IS NOT NULL AND alamat IS NOT NULL AND nohp IS NOT NULL AND tempat_lahir IS NOT NULL AND tanggal_lahir IS NOT NULL AND foto IS NOT NULL AND STATUS IS NOT NULL AND iddosen=$id");
$ci= mysql_num_rows($cs);
if ($ci==0){
    header('location:editprofil.php?ux=Dosen&page=complete');
}  else {
    $page = 'dashboard_dosen.vanray';
    $dataperpage = query("select a.idbuku, a.nama, a.pengarang, b.cover,b.tahun, b.sinapsis,b.kodebuku,b.status,b.penerbit from buku_detail b left join buku a on a.idbuku=b.idbuku where a.idkategori='1' order by a.idbuku DESC");
    $numpage = mysql_num_rows($dataperpage);
    $start = $_GET['start'];
    $eu = $start - 0;
    $limit = 12;
    $thisp= $eu + $limit;
    $back = $eu - $limit;
    $next = $eu + $limit;
    if(strlen($start) > 0 && !is_numeric($start)){
        echo 'Data Error';
        exit();
        
    }
connect();
$bu=  query("select a.idbuku, a.nama, a.pengarang, b.cover,b.tahun, b.sinapsis,b.kodebuku,b.status,b.penerbit from buku_detail b left join buku a on a.idbuku=b.idbuku where a.idkategori='1' order by a.idbuku DESC limit $eu,$limit");

?>
<!DOCTYPE html>
<html 
    <head>
        <title><?php echo $_SESSION[tipe];?> || Lihat Buku</title>
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
            
            @media only screen and (max-width: 993px){
                #pro {
                   display: none ;
                   
                }
                
                #bk {
                    width: 100%;
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
    $q= query("select * from dosen where iddosen=$id");
    $qf=  mysql_fetch_array($q);
    ?>
        <div class="row">
            <div id="pro" class="col s3" style="padding-top:115px;">
          <div class="card">
          <div class="card-content">
              <img src="gambar/library-books.jpg" height="223px">
              <div class="profile-img" style="width: 150px; height: 150px; margin-top: 88px; box-shadow: 0px 1px -4px 1px;">
                  <img class="z-depth-5" src="gambar/akun/<?php echo $qf[foto]?>" width="100%" height="100%">
              </div>
             </div> 
          <div class="card-footer">
              <div class="profil" style="text-transform:uppercase;">
                  <table><thead><tr>Profil <?php echo $_SESSION[tipe]?></tr></thead>
                      <tbody>
                          <tr>
                              <td>Nama</td><td>:</td><td><?php echo $qf[nama]?></td>
                          </tr><tr>
                              <td>NIP</td><td>:</td><td><?php echo $qf[nip]?></td>
                          </tr><tr>
                              <td>Alamat</td><td>:</td><td><?php echo $qf[alamat]?></td>
                          </tr><tr>
                              <td>No HP</td><td>:</td><td><?php echo $qf[nohp]?></td>
                          </tr>                      
                      </tbody>
                  </table>
              </div>
              </div> 
          </div>
      </div>
     
            <div id="bk" class="col s9">
    <div id="scroll-wrap" class="container">
        <div class="main">
            
            <div id="bookshelf" class="bookshelf">
                 <?php while($lp=  mysql_fetch_array($bu)) { ?>         
                
                <style>
                    .no-csstransforms3d .book[data-book="book-<?php echo $lp[idbuku]?>"],
                    .no-js .book[data-book="book-<?php echo $lp[idbuku]?>"],
                    .book[data-book="book-<?php echo $lp[idbuku]?>"] .front {
                        background: url(dokumen/bk/<?php echo $lp[cover]?>);
                        background-attachment: fixed;
                        background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.1) 0%, rgba(211, 211, 211, 0.1) 5%, rgba(255, 255, 255, 0.15) 5%, rgba(255, 255, 255, 0.1) 9%, rgba(0, 0, 0, 0.01) 100%), url(dokumen/bk/<?php echo $lp[cover]?>), #009bdb;
                        background: linear-gradient(to right, rgba(0, 0, 0, 0.1) 0%, rgba(211, 211, 211, 0.1) 5%, rgba(255, 255, 255, 0.15) 5%, rgba(255, 255, 255, 0.1) 9%, rgba(0, 0, 0, 0.01) 100%), url(dokumen/bk/<?php echo $lp[cover]?>), #009bdb;
                    }
                    
                    .book[data-book="book-<?php echo $lp[idbuku]?>"] .inner { border-color: #009bdb }
                    .book[data-book="book-<?php echo $lp[idbuku]?>"] .cover::before {
                        background: url(dokumen/bk/<?php echo $lp[cover]?>);
                        background: -webkit-linear-gradient(left, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url(dokumen/bk/<?php echo $lp[cover]?>), #009bdb;
                        background: linear-gradient(to right, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url(dokumen/bk/<?php echo $lp[cover]?>), #009bdb;
                    }
                </style>
                
                <figure>
                    <div class="book z-depth-5" data-book="book-<?php echo $lp[idbuku]?>"></div>
                    <div class="buttons"><a title="Status Buku di Perpustakaan" href="#"><?php echo $lp[status]?></a><a href="#">Details</a></div>
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
                 
            </div>
        </div><!-- /main -->
         <?php 
             if($numpage>$limit){ ?>
             <div class="text-center">
                 <ul class="pagination">
                     <?php
                 if($back>=0){
                     echo "<li><a href=$page?start=$back>PREV</a></li>";              
                 } 
                 $l = 1;
                 for($i = 0; $i < $numpage;$i = $i + $limit){
                     if($i<>$eu){
                         echo "<li><a href=$page?start=$i>$l</a></li>";                         
                     }else{
                         echo "<li class='active'><a>$l</a></li>";}		
                         $l = $l + 1;                         
                     }                     
                     if($thisp<$numpage){
                         echo "<li><a href=$page?start=$next>NEXT</a></li>";                        
                     }			}
                     ?></ul></div>
    </div><!-- /container -->
            </div></div>
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
}} else {
    header('location:index.php');
} 