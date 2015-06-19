<div class="cotainer" style="width:95%;">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <img src="gambar/stack_of_books.jpg">
                <h1>Kelola Buku</h1>
                <p>Berfungsi untuk menambahkan, megedit dan menhghapus katalog buku</p>
            </div>  

            <div class="card-footer">
                <div class="row">
                    <div class="col s5">
                        <?php
                        if ($_GET[pg] == 'edit') {
                            $l = $_GET[ux];
                            $a = $_GET[ux];
                            $c = $_GET[ib];

                            if ($l == 'kp') {
                                connect();
                                $m = query("SELECT a.eks, a.idbuku, a.pengarang, d.nama AS dosen, a.nama, a.idkategori, c.nama AS 'kategori' ,b.pembimbing, b.tempat_KP, b.abstrak FROM kp b LEFT JOIN buku a ON a.idbuku=b.idbuku LEFT JOIN kategori c  ON a.idkategori=c.idkategori LEFT JOIN dosen d ON d.iddosen=b.pembimbing WHERE a.idbuku='$c'");
                                $n = mysql_fetch_array($m);
                                ?>

                                <!-- Form Edit Kerja Praktik -->
                                <h3>Edit Laporan KP <?php echo $n[nama] ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=updatebuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[nama] ?>" name="judul" placeholder="Judul Buku" id="judul" type="text" required>
                                            <label for="judul">Judul Buku</label>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="input-field col s12"><label for="pengarang">Pengarang</label>
                                            <input value="<?php echo $n[pengarang] ?>" name="pengarang" placeholder="Nama Penulis" id="pengarang" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s12">
                                            <label>Kategori buku</label>
                                            <select name="kategori">
                                                <option value="<?php echo $n[idkategori] ?>" ><?php echo $n[kategori] ?></option>
                                                <?php
                                                connect();
                                                $gekat = query("select * from kategori");
                                                while ($getKategori = mysql_fetch_array($gekat)) {
                                                    ?>
                                                    <option value="<?php echo $getKategori[idkategori]; ?>"><?php echo $getKategori[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[eks] ?>" name="eks" placeholder="Banyak Buku (angka) ex. 4" id="eks" type="number" required>
                                            <label for="eks">Eksampler</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing</label>
                                            <select class="disabled" name="pb">
                                                <option value="<?php echo $n[pembimbing] ?>"  ><?php echo $n[dosen] ?></option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[tempat_KP] ?>" name="tempat" placeholder="Tempat Kerja Praktek" id="tempat" type="text" required>
                                            <label for="tempat">Tempat KP</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <input value="<?php echo $n[abstrak] ?>" name="abstrak" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Abstrak *.pdf</label>
                                        </div>
                                    </div> 
                                    <br>

                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form> <?php
    } elseif ($l == 'ta') {
        connect();
        $m = query("SELECT a.eks, a.idbuku, a.pengarang, d.nama AS dosen1, e.nama AS dosen2, a.nama, a.idkategori, c.nama AS 'kategori' ,b.pembimbnig1,  b.pembimbing2, b.jurnal FROM ta b LEFT JOIN buku a ON a.idbuku=b.idbuku LEFT JOIN kategori c  ON a.idkategori=c.idkategori LEFT JOIN dosen d ON d.iddosen=b.pembimbnig1 LEFT JOIN dosen e ON e.iddosen=b.pembimbing2 WHERE a.idbuku='$c'");
        $n = mysql_fetch_array($m);
        ?>

                                <!-- Form Edit Tugas Akhir -->
                                <h3>Edit Laporan TA <?php echo $n[nama] ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=updatebuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[nama] ?>" name="judul" placeholder="Judul Buku" id="judul" type="text" required>
                                            <label for="judul">Judul Buku</label>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <div class="input-field col s12"><label for="pengarang">Pengarang</label>
                                            <input value="<?php echo $n[pengarang] ?>" name="pengarang" placeholder="Nama Penulis" id="pengarang" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Kategori buku</label>
                                            <select name="kategori">
                                                <option value="<?php echo $n[idkategori] ?>"  ><?php echo $n[kategori] ?></option>
        <?php
        connect();
        $gekat = query("select * from kategori");
        while ($getKategori = mysql_fetch_array($gekat)) {
            ?>
                                                    <option value="<?php echo $getKategori[idkategori]; ?>"><?php echo $getKategori[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input value="<?php echo $n[eks] ?>" name="eks" placeholder="Banyak Buku (angka) ex. 4" id="eks" type="number" required>
                                            <label for="eks">Eksampler</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing I</label>
                                            <select class="disabled" name="pb">
                                                <option value="<?php echo $n[pembimbnig1] ?>" ><?php echo $n[dosen1] ?> </option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing II</label>
                                            <select class="disabled" name="pb2">
                                                <option value="<?php echo $n[pembimbing2] ?>"  ><?php echo $n[dosen2] ?></option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input value="<?php echo $n[jurnal] ?>" name="abstrak" id="uploader" type="file">
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Jurnal *.pdf</label>
                                        </div>
                                    </div><br>   
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form>

    <?php
    } elseif ($l == 'pp') {
        connect();
        $m = query("SELECT a.eks, a.idbuku, a.pengarang, d.nama AS dosen, a.nama, a.idkategori, c.nama AS 'kategori' ,b.pembimbing, b.abstrak FROM pp b LEFT JOIN buku a ON a.idbuku=b.idbuku LEFT JOIN kategori c  ON a.idkategori=c.idkategori LEFT JOIN dosen d ON d.iddosen=b.pembimbing WHERE a.idbuku='$c'");
        $n = mysql_fetch_array($m);
        ?>

                                <!-- Form Edit Program Profesional -->
                                <h3>Edit Laporan TA <?php echo $n[nama] ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=updatebuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[nama] ?>" name="judul" placeholder="Judul Buku" id="judul" type="text" required>
                                            <label for="judul">Judul Buku</label>
                                        </div>
                                    </div>  

                                    <div class="row">
                                        <div class="input-field col s12"><label for="pengarang">Pengarang</label>
                                            <input value="<?php echo $n[pengarang] ?>" name="pengarang" placeholder="Nama Penulis" id="pengarang" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Kategori buku</label>
                                            <select name="kategori">
                                                <option value="<?php echo $n[idkategori] ?>"  ><?php echo $n[kategori] ?></option>
        <?php
        connect();
        $gekat = query("select * from kategori");
        while ($getKategori = mysql_fetch_array($gekat)) {
            ?>
                                                    <option value="<?php echo $getKategori[idkategori]; ?>"><?php echo $getKategori[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input value="<?php echo $n[eks] ?>" name="eks" placeholder="Banyak Buku (angka) ex. 4" id="eks" type="number" required>
                                            <label for="eks">Eksampler</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing</label>
                                            <select class="disabled" name="pb">
                                                <option value="<?php echo $n[pembimbing] ?>" ><?php echo $n[dosen] ?> </option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input value="<?php echo $n[abstrak] ?>" name="abstrak" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Abstrak *.pdf</label>
                                        </div>
                                    </div><br>   
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form>
    <?php
    } elseif ($l == 'bk') {

        connect();
        $m = query("SELECT a.eks, a.idbuku, a.pengarang, b.cover, b.tahun, b.kodebuku, b.sinapsis, a.nama, a.idkategori, c.nama AS 'kategori' ,b.penerbit, b.isbn FROM buku_detail b LEFT JOIN buku a ON a.idbuku=b.idbuku LEFT JOIN kategori c  ON a.idkategori=c.idkategori WHERE a.idbuku='$c'");
        $n = mysql_fetch_array($m);
        ?>

                                <!-- Form Edit Program Profesional -->
                                <h3>Edit Buku <?php echo $n[nama] ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=updatebuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <label for="judul">Judul Buku</label>
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[nama] ?>" name="judul" placeholder="Judul Buku" id="judul" type="text" required>

                                        </div>
                                    </div>  

                                    <div class="row">
                                        <label for="pengarang">Pengarang</label>
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[pengarang] ?>" name="pengarang" placeholder="Nama Penulis" id="pengarang" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label>Kategori buku</label>
                                        <div class="select-wrapper col s12">

                                            <select name="kategori">
                                                <option value="<?php echo $n[idkategori] ?>"  ><?php echo $n[kategori] ?></option>
        <?php
        connect();
        $gekat = query("select * from kategori");
        while ($getKategori = mysql_fetch_array($gekat)) {
            ?>
                                                    <option value="<?php echo $getKategori[idkategori]; ?>"><?php echo $getKategori[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="eks">Eksampler</label>
                                        <div class="input-field col s">
                                            <input value="<?php echo $n[eks] ?>" name="eks" placeholder="Banyak Buku (angka) ex. 4" id="eks" type="number" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="kode">Kode Buku</label>
                                        <div class="input-field col s6">
                                            <input value="<?php echo $n[kodebuku] ?>" name="kodebuku" placeholder="Kode Buku" id="kode" type="text" required>

                                        </div>
                                    </div>       

                                    <div class="row"><label for="penerbit">Penerbit</label>
                                        <div class="input-field col s12">
                                            <input name="penerbit" value="<?php echo $n[penerbit] ?>" placeholder="Penerbit" id="penerbit" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="tahun">Tahun Terbit</label>
                                        <div class="input-field col s12">
                                            <input name="tahun" placeholder="tahun terbit e.g 2008" value="<?php echo $n[tahun] ?>" id="tahun" type="number" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="isbn">ISBN</label>
                                        <div class="input-field col s12">
                                            <input value="<?php echo $n[isbn] ?>"  name="isbn" placeholder="isbn" id="tahun" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="sinapsis">sinapsis</label>
                                        <div class="input-field col s12">
                                            <textarea name="sinapsis" placeholder="deskripsi singkat buku"><?php echo $n[sinapsis] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <img src="dokumen/bk/<?php echo $n[cover] ?>" width="130px" style="padding-left:40px;">
                                        <input name="gambar" id="uploader" type="file">
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">Cover Buku (File gambar)</label>
                                        </div>
                                    </div> <br>  

                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form>  <?php
                    }
                } else {
                    $a = $_GET[ux];
                    $b = $_GET[title];
                    $c = $_GET[ib];

                    if ($a == 'kp') {
                        ?>
                                <!-- Form Kerja Praktik -->
                                <h3><?php echo $b ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpanbuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing</label>
                                            <select name="pb">
                                                <option value=""  >Choose your option</option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="tempat" placeholder="Tempat Kerja Praktek" id="tempat" type="text" required>
                                            <label for="tempat">Tempat KP</label>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <input name="abstrak" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Abstrak *.pdf</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form> <?php } elseif ($a == 'pp') { ?>
                                <!-- Form PP -->
                                <h3><?php echo $b ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpanbuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing</label>
                                            <select name="pb">
                                                <option value=""  >Choose your option</option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <input name="abstrak" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Abstrak *.pdf</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form> 
                                            <?php } elseif ($a == 'ta') { ?>
                                <!-- Form TA -->
                                <h3><?php echo $b ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpanbuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing I</label>
                                            <select name="pb">
                                                <option value=""  >Choose your option</option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Dosen Pembimbing II</label>
                                            <select class="disabled" name="pb2">
                                                <option value=""  >Choose your option</option>
        <?php
        connect();
        $dosen = query("select * from dosen");
        while ($ardos = mysql_fetch_array($dosen)) {
            ?>
                                                    <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <input name="abstrak" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">File Jurnal *.pdf</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form> 
    <?php } elseif ($a == 'bk') { ?>
                                <!-- Form Buku -->
                                <h3><?php echo $b ?></h3><hr>
                                <form class="col s12" enctype="multipart/form-data" method="post" action="aksi.php?as=simpanbuku&ux=<?php echo $a ?>&ib=<?php echo $c ?>">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="kodebuku" placeholder="Kode Buku" id="kode" type="text" required>
                                            <label for="kode">Kode Buku</label>
                                        </div>
                                    </div>       

                                    <div class="row">
                                        <div class="input-field col s12"><label for="penerbit">Penerbit</label>
                                            <input name="penerbit" placeholder="Penerbit" id="penerbit" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12"><label for="tahun">Tahun Terbit</label>
                                            <input class="datepicker picker__input" name="tahun" placeholder="tahun terbit e.g 2008" id="tahun" type="number" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12"><label for="isbn">ISBN</label>
                                            <input  name="isbn" placeholder="isbn" id="tahun" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12"><label for="sinapsis">sinapsis</label>
                                            <textarea name="sinapsis" placeholder="deskripsi singkat buku"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <input name="gambar" id="uploader" type="file" required>
                                        <div class="col s6">
                                            <label for="uploader" style="display: inline-block;;">Cover Buku (File gambar)</label>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                    </div>
                                </form>

    <?php } else { ?>

                                <!-- Form Tambah Buku -->
                                <h3>Tambahkan Buku</h3><hr>
                                <form class="col s12" method="post" action="aksi.php?as=tambahbuku">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="judul" placeholder="Judul Buku" id="judul" type="text" required>
                                            <label for="judul">Judul Buku</label>
                                        </div>
                                    </div>       

                                    <div class="row">
                                        <div class="input-field col s12"><label for="pengarang">Pengarang</label>
                                            <input name="pengarang" placeholder="Nama Penulis" id="pengarang" type="text" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Kategori buku</label>
                                            <select name="kategori">
                                                <option value=""  >Choose your option</option>
                            <?php
                            connect();
                            $gekat = query("select * from kategori");
                            while ($getKategori = mysql_fetch_array($gekat)) {
                                ?>
                                                    <option value="<?php echo $getKategori[idkategori]; ?>"><?php echo $getKategori[nama]; ?></option><?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="eks" placeholder="Banyak Buku (angka) ex. 4" id="eks" type="number" required>
                                            <label for="eks">Eksampler</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row col s2 offset-s4">
                                        <button class="waves-effect waves-light btn" type="submit">Tambah</button>
                                    </div>
                                </form><?php }
            } ?>

                    </div>
<?php
$q = $_GET['q'];
$page = 'admin.php?halaman=buku';
$dataperpage = query("select a.pengarang as 'pengarang', a.idbuku as 'idbuku', a.nama as 'nama', b.nama as 'kategori' from buku a left join kategori b on a.idkategori=b.idkategori");
$numpage = mysql_num_rows($dataperpage);
$start = $_GET['start'];
$eu = $start - 0;
$limit = 10;
$thisp = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;
if (strlen($start) > 0 && !is_numeric($start)) {
    echo 'Data Error';
    exit();
}
?>
                    <div id="daftarbuku" class="col s12" style="box-shadow: 0px 0px 1px 0px; border-radius: 10px;">
                        <div class="row" style="margin-bottom: -6px;">
                            <h3 class="col s6">Daftar Buku di database</h3> <form action="aksi.php?as=admincaribuku" method="post" class="col s4" style="float: right;" > <input value="<?php echo $q; ?>" placeholder="cari judul" name="q" type="text">  </form></div><hr>
                        <table class="hoverable">
                                <?php
                                connect();
                                $q = $_GET[q];
                                if (strlen($q) > 0) {
                                    $buku = query("select a.pengarang as 'pengarang', a.idbuku as 'idbuku', a.nama as 'nama', b.nama as 'kategori' from buku a left join kategori b on a.idkategori=b.idkategori where a.nama like '%$q%' limit $eu,$limit");
                                    echo "<style>.pagination{display:none;}</style>";
                                } else {
                                    $buku = query("select a.pengarang as 'pengarang', a.idbuku as 'idbuku', a.nama as 'nama', b.nama as 'kategori' from buku a left join kategori b on a.idkategori=b.idkategori limit $eu,$limit");
                                }
                                $jb = mysql_num_rows($buku);
                                if ($jb == 0) {
                                    echo " <h2>Tidak Ada buku dalam database </h2>";
                                } else {
                                    $no = $start + 1;
                                    ?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Kategori</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>                      

                                <tbody>
    <?php
    while ($arbuku = mysql_fetch_array($buku)) {
        if ($arbuku[kategori] == 'Kerja Praktek') {
            $ux = 'kp';
        } elseif ($arbuku[kategori] == 'Tugas Akhir') {
            $ux = 'ta';
        } elseif ($arbuku[kategori] == 'Program Profesional') {
            $ux = 'pp';
        } elseif ($arbuku[kategori] == 'Buku') {
            $ux = 'bk';
        }
        echo "
                                                   
                                            <tr>
                                                <td>$no</td>
                                                <td>$arbuku[nama]</td>
                                                <td>$arbuku[pengarang]</td>
                                                <td>$arbuku[kategori]</td>
                                                <td style='width:90px;'><a title='Edit' href='admin.php?halaman=buku&pg=edit&ux=$ux&ib=$arbuku[idbuku]' class='btn-floating'><i class='mdi-image-edit'></i></a> <a title='Hapus' href='aksi.php?as=hapusbuku&ux=$ux&ib=$arbuku[idbuku]' class='btn-floating' style='background-color: red;'><i class='mdi-action-delete'></i></a> </td>
                                            </tr> ";
        $no++;
    }
}
?>
                            </tbody>
                        </table>
                            <br>
                             <?php if ($numpage > $limit) { ?>
                        <div id="pas" class="text-center">
                            <ul class="pagination">
                                <?php
                                if ($back >= 0) {
                                    echo "<li><a href=$page&start=$back>PREV</a></li>";
                                }
                                $l = 1;
                                for ($i = 0; $i < $numpage; $i = $i + $limit) {
                                    if ($i <> $eu) {
                                        echo "<li><a href=$page&start=$i>$l</a></li>";
                                    } else {
                                        echo "<li class='active'><a>$l</a></li>";
                                    }
                                    $l = $l + 1;
                                }
                                if ($thisp < $numpage) {
                                    echo "<li><a href=$page&start=$next>NEXT</a></li>";
                                }
                            }
                            ?></ul></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>