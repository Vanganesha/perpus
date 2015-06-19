<?php
$tampil = $_GET[show];
?>
<div class="cotainer" style="width: 95%">
    <div class="col s12 m6">
        <div class="card">    
            <div class="card-content">
                <img src="gambar/4.jpg">
                <h1>Kelola Peminjaman Buku </h1>
                <p>Halaman ini digunakan untuk mengelolah peminjaman buku yang dilakukan oleh dosen.</p>
            </div> 
            <?php
            if ($tampil == 'detail') {
                $idp = $_GET[ip];
                $ekd = query("select * from pinjam where idpinjam = '$idp'");
                ?>
                <div class="card-footer">
                    <div class="col s12">
                        <h2>Buku Apa yang dipinjam?</h2><hr>
                        <div class="row">
                            <div class="col s6">
                                <form action="aksi.php?as=bukudetailtambah&ip=<?php echo $idp ?>" method="post">
                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Judul Buku</label>
                                            <select class="disabled" name="buku">
                                                <option disabled selected>Pilih Satu</option>
                                                <?php
                                                connect();
                                                $dosen = query("SELECT a.nama,b.idbuku_detail,b.kodebuku from buku a left join buku_detail b on a.idbuku=b.idbuku where a.idbuku=b.idbuku");
                                                while ($ardos = mysql_fetch_array($dosen)) {
                                                    ?>
                                                    <option value="<?php echo $ardos[idbuku_detail]; ?>"><?php echo "$ardos[nama]-" . "$ardos[kodebuku]"; ?></option><?php } ?>
                                            </select>
                                        </div></div>
                                    <div class="row">
                                        <div class="row col s2 offset-s4">
                                            <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            <?php
            } elseif ($tampil == 'edit') {
                $idp = $_GET[id];
                $dat = query("select e.nama as 'buku', d.penerbit, a.kodepinjam, b.nama,a.tanggal_pinjam,a.tanggal_kembali,a.idpinjam from pinjam a left join dosen b on a.iddosen=b.iddosen left join pinjam_detail c on a.idpinjam=c.idpinjam left join buku_detail d on c.idbuku_detail=d.idbuku_detail left join buku e on d.idbuku=e.idbuku where c.idpinjam='$idp' group by (c.idbuku_detail) ");
                $iss = mysql_fetch_array($dat);
                ?>
                <div class="card-footer">
                    <div class="col s12">
                        <h2>Tambah Buku ?</h2><hr>
                        <div class="row">
                            <div class="col s6">
                                <form action="aksi.php?as=bukudetailedit&ip=<?php echo $idp ?>" method="post">
                                    <div class="row">
                                        <div class="select-wrapper col s6">
                                            <label>Judul Buku</label>
                                            <select class="disabled" name="buku">
                                                <option disabled selected>Pilih Satu</option>
                                                <?php
                                                connect();
                                                $dosen = query("SELECT a.nama,b.idbuku_detail,b.kodebuku from buku a left join buku_detail b on a.idbuku=b.idbuku where a.idbuku=b.idbuku");
                                                while ($ardos = mysql_fetch_array($dosen)) {
                                                    ?>
                                                    <option value="<?php echo $ardos[idbuku_detail]; ?>"><?php echo "$ardos[nama]-" . "$ardos[kodebuku]"; ?></option><?php } ?>
                                            </select>
                                        </div></div>
                                    <div class="row">
                                        <div class="row col s2 offset-s4">
                                            <button class="waves-effect waves-light btn" type="submit">Simpan</button>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 text-center">
                        <h5 style="text-transform:uppercase;">Buku Yang Dipinjam <i><?php echo $iss[nama] ?></i> dengan kode <b><?php echo $iss[kodepinjam] ?></b></h5><hr>
                        <table class="hoverable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Peminjaman</th>
                                    <th>Dosen Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Penerbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $drr = query("select c.idpinjam_detail, e.nama as 'buku', d.penerbit, a.kodepinjam, b.nama,a.tanggal_pinjam,a.tanggal_kembali,a.idpinjam from pinjam a left join dosen b on a.iddosen=b.iddosen left join pinjam_detail c on a.idpinjam=c.idpinjam left join buku_detail d on c.idbuku_detail=d.idbuku_detail left join buku e on d.idbuku=e.idbuku where c.idpinjam='$idp' group by (c.idbuku_detail) ");
                                while ($fe = mysql_fetch_array($drr)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $fe[kodepinjam] ?></td>
                                        <td><?php echo $fe[nama] ?></td>
                                        <td><?php echo $fe[buku] ?></td>
                                        <td><?php echo $fe[penerbit] ?></td>
                                        <td><a onclick="var x = confirm('Anda yakin menghapus ?');
                                                if (x == true) {
                                                    window.location = 'aksi.php?as=hapusdetailbuku&id=<?php echo $fe[idpinjam_detail] ?>'
                                                }" href="#">Hapus</a></td>
                                    </tr><?php $no++;
                        } ?>
                            </tbody>
                        </table>

                    </div>

<?php } else { ?>
                    <!-- -->
                    <div class="card-footer">
                        <div class="col s12">
                            <div  class="row">

                                <div class="col s6">
                                    <a class="modal-trigger" href="#pinjam2">
                                        <div class="card" style="background:url('gambar/4.jpg'); background-size: 100%; ">
                                            <div class="card-content">
                                                <h2 style="color: #FFF; text-transform: uppercase;">Peminjaman Buku</h2>
                                                <p style="color: #FFF; text-transform: uppercase;">Untuk menambahkan peminjaman yang dilakukan dosen tanpa melalui sistem</p>
                                            </div> </div>
                                    </a>                        
                                    <div class="modal" id="pinjam2">
                                        <h3>Input Kode Pinjam dari dosen</h3><hr>
                                        <form class="col s12" method="post" action="aksi.php?as=pinjambuku&p=manual">
                                            <div class="row">
                                                <label for="kodepinjam">Kode Pinjam Buku (Otomatis dari Sistem)</label>
                                                <input value="<?php echo autokodepinjam(); ?>" type="text" name="kodepinjam" placeholder="Kode Pinjam Dari Dosen ex. AL3SK2">
                                            </div>
                                            <div class="row">
                                                <div class="select-wrapper col s6">
                                                    <label>Nama Dosen</label>
                                                    <select class="disabled" name="nama">
                                                        <option disabled selected>Nama Dosen</option>
                                                        <?php
                                                        connect();
                                                        $dosen = query("SELECT * FROM dosen");
                                                        while ($ardos = mysql_fetch_array($dosen)) {
                                                            ?>
                                                            <option value="<?php echo $ardos[iddosen]; ?>"><?php echo $ardos[nama]; ?></option><?php } ?>
                                                    </select>
                                                </div>
                                            </div>  

                                            <div class="row">
                                                <label for="kodepinjam">Tanggal Pengembalian</label>
                                                <input type="date" id="tglkembali" name="tglkembali" placeholder="tanggal Kembali">
                                            </div>
                                            <div class="row text-center">
                                                <button type="submit" class="btn waves-effect waves-light">OK</button>
                                                <button type="button" class="btn waves-effect waves-light modal_close">Kembali</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div class="col s6">
                                    <a class="modal-trigger" href="#kembali1">
                                        <div class="card" style="background:url('gambar/4.jpg'); background-size: 100%;">
                                            <div class="card-content">
                                                <h2 style="color: #FFF; text-transform: uppercase;">Pengembalian Buku</h2>
                                                <p style="color: #FFF; text-transform: uppercase;">Untuk mengelola Pengembalian Buku yang dilakukan oleh Dosen</p>
                                            </div> </div>
                                    </a>                        
                                    <div class="modal" id="kembali1">
                                        <h3>Input Kode Pinjam dari dosen</h3><hr>
                                        <form class="col s12" method="post" action="aksi.php?as=kembalibuku">
                                            <div class="row">
                                                <label for="kodepinjam">Masukkan Kode Peminjaman</label>
                                                <input type="text" name="kodepinjam" placeholder="Kode Pinjam Dari Dosen ex. AL3SK2">
                                            </div>
                                            <div class="row text-center">
                                                <button type="submit" class="btn waves-effect waves-light">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>  

                            </div><br><br>
                            <div class="col s12 text-center">
                                <h4>Daftar Peminjaman Buku</h4><hr>
                                <table class="hoverable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Peminjaman</th>
                                            <th>Dosen Peminjam</th>
                                            <th>Banyak Buku dipinjam</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Harus Kembali</th>
                                            <th>Status Peminjaman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dat = query("select a.status, a.kodepinjam, b.nama, count(c.idpinjam) as 'jpinjam',a.tanggal_pinjam,a.tanggal_kembali,a.idpinjam from pinjam a left join dosen b on a.iddosen=b.iddosen left join pinjam_detail c on a.idpinjam=c.idpinjam  group by (c.idpinjam) order by a.status ASC");
                                        $no = 1;
                                        while ($fe = mysql_fetch_array($dat)) {
                                            if($fe[status]=='Aktif'){
                                                $lk='Belum Kembali';
                                                $edi="<a href='admin.php?halaman=pinjam&show=edit&id=$fe[idpinjam]' class='modal-trigger'>Edit</a>";
                                            } else{
                                                $lk='Sudah Kembali';
                                                $edi='-';
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $fe[kodepinjam] ?></td>
                                                <td><?php echo $fe[nama] ?></td>
                                                <td class="text-center"><a href="#detail-<?php echo $fe[idpinjam] ?>" class="modal-trigger"><?php echo $fe[jpinjam] ?></a></td>
                                                <td><?php echo tgl_indo($fe[tanggal_pinjam]) ?></td>
                                                <td><?php echo tgl_indo($fe[tanggal_kembali]) ?></td>
                                                <td><?php echo $lk ?></td>
                                                <td><?php echo $edi ?></td>
                                            </tr><?php $no++;
                                        } ?>
                                    </tbody>
                                </table>


    <?php
    $pl = query("SELECT * from pinjam_detail");
    while ($dem = mysql_fetch_array($pl)) {
        ?>

                                    <div id="detail-<?php echo $dem[idpinjam] ?>" class="modal">
                                        <h4>Buku Yang dipinjam</h4><hr>
        <?php
        $no = 1;
        $ll = query("SELECT a.nama, b.kodebuku, b.penerbit,b.cover, c.idbuku_detail, d.idpinjam FROM pinjam_detail c left join buku_detail b on c.idbuku_detail=b.idbuku_detail left join buku a on b.idbuku=a.idbuku left join pinjam d on c.idpinjam=d.idpinjam where c.idpinjam='$dem[idpinjam]'");
        while ($di = mysql_fetch_array($ll)) {
            ?>                              <img src="dokumen/bk/<?php echo $di[cover]?>" width="80px" height="100px" style="float:right;">
                                            <p style="text-align: left"><?php echo $no ?></p>
                                            <p style="text-align: left">Judul Buku : <?php echo $di[nama] ?></p>
                                            <p style="text-align: left">Kode Buku  : <?php echo $di[kodebuku] ?></p>
                                            <p style="text-align: left">Penerbit   : <?php echo $di[penerbit] ?></p><hr>
            <?php $no++;
        }
        ?>

                                    </div>
    <?php } ?>
                            </div>
                        </div>
                    </div><?php } ?> <!-- -->
            </div>
        </div>
    </div>