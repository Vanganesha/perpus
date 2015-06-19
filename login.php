<?php 
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login Ke Sistem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Sistem Informasi Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya" />
        <meta name="keywords" content="perpustakaan, informatika" />
        <meta name="author" content="Van Ray Hosea" />
        <link rel="stylesheet" type="text/css" href="asset/demo.css" />
        <link rel="stylesheet" type="text/css" href="asset/style.css" />
        <link rel="stylesheet" type="text/css" href="asset/animate-custom.css" />
    </head>
    <body style="background: url('gambar/perpus.jpg');">
        <div class="container" id="container">
            <!--
            <header>
                <h1>Login Ke <span>Sistem Informasi Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya</span></h1>
            </header> -->
            <section style="margin-top: 50px;">				
                <div id="container" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="POST"  action="ceklogin.php" autocomplete="on"> 
                                <h1 style="color: #7cbcd6; text-shadow: 0px 1px 1px rgba(255,255,255,0.8);font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
font-size: 35px;">Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="ex. Panco11"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="ex. C2K9cvJ" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Belum Punya Akun ?
									<a href="#toregister" class="to_register">cek di sini</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            
                                <h1 style="color: #7cbcd6; text-shadow: 0px 1px 1px rgba(255,255,255,0.8);font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
font-size: 35px;"> Belum Punya Akun ? </h1> 
                            <p>
                            <li> Mendaftar Ke Pihak Jurusan / Petugas Perpustakaan</li><br></p><p>
                            <li> Login menggunakan username dan password yang diberikan</li></p>
                                <br>
                                
                                <p class="change_link">  
									<a href="#tologin" class="to_register"> Kembali </a>
								</p>
                           
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>