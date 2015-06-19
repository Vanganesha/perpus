<?php
error_reporting(0);
session_start();
include 'fungsi.php';
 $id=$_SESSION[iddosen];
 $sk=$_SESSION[idmahasiswa];
$z=  query("select * from dosen where iddosen=$id");
$y=  mysql_fetch_array($z);

$x=  query("select * from mahasiswa where idmahasiswa=$sk");
$w=  mysql_fetch_array($x);
/* 
 * The MIT License
 *
 * Copyright 2014 GEROBAKJEN Inc. by Van Ray Hosea 
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
<!DOCTYPE html>
<html 
    <head>

        <title><?php echo $_SESSION[tipe]?> | <?php echo $y[nama]?> Lihat Buku</title>

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
            
        </style>
    </head>
    
    <body>
        <!-- Navigasi -->
<?php include 'nav.php';?>
        <div class="cotainer" style="width: 95%">
            <div class="row">
                <div class="col s12">
                    <h4 style="text-transform: uppercase; text-align: center;">Lengkapi Dahulu Data Anda</h4><hr>
                </div>
                <div class="row">
                    <div class="col s6">
                        <?php 
                        $a=$_GET[ux];
                        
                        if($a=='Dosen'){ ?>
                       
                                <div class="cotainer" style="width:95%;">
                                     <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpandatauser&ux=dosen&id=<?php echo $id?>">
                                <div class="row"><label for="nama">Nama</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[nama]?>" name="nama" placeholder="nama ex. Van Ray Hosea" id="nama" type="text" required>                                        
                                    </div>
                                </div>   
                                
                                <div class="row"><label for="nip">nip</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[nip]?>" name="nip" placeholder="NIP ex. 19930111 201501 1 002" id="nip" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="username">username</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[username]?>" name="username" placeholder="username ex. panco111" id="username" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="password">password</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[password]?>" name="password" placeholder="password ex. naloakan23" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="password">alamat</label>
                                    <div class="input-field col s12">
                                        <textarea required name="alamat" placeholder="alamat ex. Jl. Badak "><?php echo $y[alamat]?></textarea>
                                    </div>
                                </div>
                                 
                                <div class="row"><label for="nohp">No HP</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[nohp]?>" name="nohp" placeholder="nomor HP ex. 081237747288" type="text" required>
                                    </div>
                                </div>
                                   
                                <div class="row"><label for="tl">Tempat Lahir</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[tempat_lahir]?>" name="tl" placeholder="Tempat Lahir ex. Medan" type="text" required>
                                    </div>
                                </div>
                                    
                                <div class="row"><label for="tgl">Tanggal Lahir</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $y[tanggal_lahir]?>" name="tgl" placeholder="format hari/bulan/tahun ex. 25/11/1981" type="date" required>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <input name="gambar" id="uploader" type="file">
                                    <div class="col s6">
                                        <label for="uploader" style="display: inline-block;;">Foto (*. jpg)</label>
                                    </div>
                                </div>
                                
                                <br>
                                
                                <div class="row col s2 offset-s4">
                                    <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                </div>
                        </form>
                                </div>                      
                            
                        
                        <?php } elseif ($a=='Mahasiswa') { ?>
                        <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpandatauser&ux=mahasiswa&id=<?php echo $sk ?>">
                                <div class="cotainer" style="width:95%;">
                                <div class="row"><label for="nama">Nama</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[nama]?>" name="nama" placeholder="nama ex. Van Ray Hosea" id="nama" type="text" required>
                                        
                                    </div>
                                </div>   
                                
                                <div class="row"><label for="nip">nim</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[nim]?>" name="nim" placeholder="NIM ex. 111117" id="nip" type="number" required>
                                    </div>
                                </div>
                                    
                                <div class="row"><label for="ayah">Nama Ayah</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[nama_ayah]?>" name="ayah" placeholder="Nama Ayah ex. Sutarman" id="nama" type="text" required>
                                        
                                    </div>
                                </div>   
                                
                                <div class="row"><label for="ibu">Nama Ibu</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[nama_ibu]?>" name="ibu" placeholder="Nama Ibu ex. Suriati" id="nip" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="username">username</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[username]?>" name="username" placeholder="username ex. panco111" id="username" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="password">password</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[password]?>" name="password" placeholder="password ex. naloakan23" type="text" required>
                                    </div>
                                </div>
                                
                                <div class="row"><label for="alamat">alamat</label>
                                    <div class="input-field col s12">
                                        <textarea name="alamat" placeholder="alamat ex. Jl. Badak " required><?php echo $w[alamat]?></textarea>
                                    </div>
                                </div>
                                 
                                <div class="row"><label for="nohp">No HP</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[nohp]?>" name="nohp" placeholder="nomor HP ex. 081237747288" type="number" required>
                                    </div>
                                </div>
                                   
                                <div class="row"><label for="tl">Tempat Lahir</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[tempat_lahir]?>" name="tl" placeholder="Tempat Lahir ex. Medan" type="text" required>
                                    </div>
                                </div>
                                    
                                <div class="row"><label for="tgl">Tanggal Lahir</label>
                                    <div class="input-field col s12">
                                        <input value="<?php echo $w[tanggal_lahir]?>" name="tgl" placeholder="format hari/bulan/tahun ex. 25/11/1981" type="date" required>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <input name="gambar" id="uploader" type="file">
                                    <div class="col s6">
                                        <label for="uploader" style="display: inline-block;;">Foto (*. jpg)</label>
                                    </div>
                                </div>
                                
                                <br>
                                
                                <div class="row col s2 offset-s4">
                                    <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                </div>
                                </div>                      
                            </form>
                        <?php } elseif ($a=='Admin') {
     echo "<h4>Admin tidak perlu melakukan edit profil</h4>";
}
                        ?>
                    </div>
                </div>
            </div>
            
            
        </div></body></html>

