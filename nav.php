    <?php
    if($_SESSION[tipe]=='Dosen'){
        $id=$_SESSION[iddosen];
        $a=  query("select foto from dosen where iddosen=$id");
        $qf= mysql_fetch_array($a);
        $foto=$qf[foto];
    }elseif($_SESSION[tipe]=='Mahasiswa'){
        $id=$_SESSION[idmahasiswa];
        $a=  query("select foto from mahasiswa where idmahasiswa=$id");
        $qf= mysql_fetch_array($a);
        $foto=$qf[foto];
    }  else {
        $foto='no-poto.jpg';
    }
    ?>  
    
    <nav id="">
      <div class="ll">
          <div class="nav-wrapper"><a href="index.php" class="brand-logo panco-nav"><img src="logo.png" class="aka"><div class="se"> <b>  Sistem Informasi Perpustakaan</b> <xm> Jurusan Teknik Informatika </xm> </div></a>
          <ul id="nav-mobile" class="right side-nav">
              <li><a href="view_buku.vanray">Buku</a></li>
              <li><a href="view_laporan.vanray">Kumpulan Laporan</a></li>
              <li><a href="profile.vanray?ux=<?php echo $_SESSION[tipe]?>"><img class="profile-img" src="gambar/akun/<?php echo $foto?>" width="30px"><?php echo $_SESSION[username]?></a></li>
              <li><a href="keluar">Logout</a></li>
              <li>
                  <div class="searchbox">
                                    <form action="search.php?s=" method="get">
                                        <input type="text" class="searchbox-inputtext" id="searchbox-inputtext" name="s" placeholder="Search.." style="width: 130px;">
                                        <label class="searchbox-icon" for="searchbox-inputtext"><i class="mdi-action-search"></i></label>
                                        <input type="submit" class="searchbox-submit" value="Search">
                                    </form>
                                </div>
              </li>
          </ul>
              <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
      </div>
    </nav>