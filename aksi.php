<?php

error_reporting(0);
session_start();
include 'fungsi.php';

$aksi = $_GET['as'];


 // Start Aksi Kelola Akun
 // 1. Tambah Buku
if ($aksi == 'tambahbuku') {
    $a = $_POST[judul];
    $b = $_POST[pengarang];
    $c = $_POST[kategori];
    $d = $_POST[eks];
    connect();
    $e = query("insert into buku values('','$a','$b','$c','$d')");
    connect();
    $f = query("select a.idbuku, a.nama as 'nam', a.idkategori, b.nama as 'nama' from buku a left join kategori b on a.idkategori=b.idkategori where a.idkategori=b.idkategori and a.nama='$a'");
    $g = mysql_fetch_array($f);
    $h = $g[nama];
    $j = $g[idbuku];
    $k = $g[nam];

    if ($h == 'Buku') {
        connect();
        $i = query("insert into buku_detail (idbuku) values ('$j')");
        header("location:admin.php?halaman=buku&ux=bk&ib=$j&title=Lengkapi Data $k");
    } elseif ($h == 'Tugas Akhir') {
        connect();
        $i = query("insert into ta (idbuku) values ('$j')");
        header("location:admin.php?halaman=buku&ux=ta&ib=$j&title=Lengkapi Data $k");
    } elseif ($h == 'Program Profesional') {
        connect();
        $i = query("insert into pp (idbuku) values ('$j')");
        header("location:admin.php?halaman=buku&ux=pp&ib=$j&title=Lengkapi Data $k");
    } elseif ($h == 'Kerja Praktek') {
        connect();
        $i = query("insert into kp (idbuku) values ('$j')");
        header("location:admin.php?halaman=buku&ux=kp&ib=$j&title=Lengkapi Data $k");
    }
}

if ($aksi == 'simpanbuku') {
    $a = $_GET[ux];

    if ($a == 'kp') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $tempat = $_POST[tempat];
        $file = $_FILES[abstrak];
        $nm = $file[name];
        $ext = substr($nm, -4, 4);
        $abs = md5($nm) . $ext;
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&ux=kp&ib=$id&title=Lengkapi Data Laporan KP';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/kp/' . $abs);
            }
            connect();
            $xx = query("update kp set pembimbing='$dpb', tempat_KP='$tempat', abstrak='$abs' where idbuku='$id'");
            echo "<script>alert('Data Berhasil Disimpan.');
				window.location='dashboard_admin.vanray';
			</script>";
        }
    } elseif ($a == 'pp') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $file = $_FILES[abstrak];
        $abs = $file[name];
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&ux=pp&ib=$id&title=Lengkapi Data Laporan PP';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/pp/' . $abs);
            }
            connect();
            $xx = query("update pp set pembimbing='$dpb', abstrak='$abs' where idbuku='$id'");
            echo "<script>alert('Data Berhasil Disimpan.');
				window.location='dashboard_admin.vanray';
			</script>";
        }
    } elseif ($a == 'ta') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $dp = $_POST[pb2];
        $file = $_FILES[abstrak];
        $nm = $file[name];
        $ext = substr($nm, -4, 4);
        $abs = md5($nm) . $ext;
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&ux=ta&ib=$id&title=Lengkapi Data Laporan Tugas Akhir';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/ta/' . $abs);
            }
            connect();
            $xx = query("update ta set pembimbnig1='$dpb', pembimbing2='$dp', jurnal='$abs' where idbuku='$id'");
            echo "<script>alert('Data Berhasil Disimpan.');
				window.location='dashboard_admin.vanray';
			</script>";
        }
    } elseif ($a == 'bk') {
        $id = $_GET[ib];
        $kb = $_POST[kodebuku];
        $penerbit = $_POST[penerbit];
        $tahun = $_POST[tahun];
        $isbn = $_POST[isbn];
        $desc = $_POST[sinapsis];
        $file = $_FILES[gambar];
        $abs = $file[name];
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != 'image/jpeg') {
            echo "<script>alert('$tipe, File harus berbentuk JPG.');
				window.location='admin.php?halaman=buku&ux=bk&ib=$id&title=Lengkapi Data Buku';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/bk/' . $abs);
            }
            connect();
            $xx = query("update buku_detail set kodebuku='$kb', penerbit='$penerbit', cover='$abs', tahun='$tahun', isbn='$isbn', sinapsis='$desc', status='Tersedia' where idbuku='$id'");
            echo "<script>alert('Data Berhasil Disimpan.');
				window.location='dashboard_admin.vanray';
			</script>";
        }
    }
}
// 2. Edit Buku
if ($aksi == 'updatebuku') {
    $a = $_GET[ux];
    $id = $_GET[ib];

    $lo = $_POST[judul];
    $b = $_POST[pengarang];
    $c = $_POST[kategori];
    $d = $_POST[eks];
    connect();
    $e = query("update buku set nama='$lo',pengarang='$b',idkategori='$c',eks='$d' where idbuku='$id'");

    if ($a == 'kp') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $tempat = $_POST[tempat];
        $file = $_FILES[abstrak];
        $abs = $file[name];
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&ux=kp&ib=$id&title=Lengkapi Data Laporan KP';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/kp/' . $abs);
            }
            connect();
            $xx = query("update kp set pembimbing='$dpb', tempat_KP='$tempat', abstrak='$abs' where idbuku='$id'");
            header("location:dashboard_admin.vanray");
        }
    } elseif ($a == 'pp') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $file = $_FILES[abstrak];
        $abs = $file[name];
        $tmp = $file[tmp_name];
        $tipe = $file[type];

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&ux=pp&ib=$id&title=Lengkapi Data Laporan PP';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/pp/' . $abs);
            }
            connect();
            $xx = query("update pp set pembimbing='$dpb', abstrak='$abs' where idbuku='$id'");
            header("location:dashboard_admin.vanray");
        }
    } elseif ($a == 'ta') {
        $id = $_GET[ib];
        $dpb = $_POST[pb];
        $dp = $_POST[pb2];
        $file = $_FILES[abstrak];
        $abs = $file[name];
        $tmp = $file[tmp_name];
        $tipe = $file[type];
        
        if(empty($file[name])){
          connect();
            $xx = query("update ta set pembimbnig1='$dpb', pembimbing2='$dp' where idbuku='$id'");
            echo "<script>alert('Data Berhasil disimpan.');
				window.location='dashboard_admin.vanray';
			</script>"; 
        }else{

        if ($tipe != "application/pdf") {
            echo "<script>alert('File harus berbentuk PDF.');
				window.location='admin.php?halaman=buku&pg=edit&ux=ta&ib='$id';
			</script>";
        } else {

            if (!empty($tmp)) {
                move_uploaded_file($tmp, 'dokumen/ta/' . $abs);
            }
            connect();
            $xx = query("update ta set pembimbnig1='$dpb', pembimbing2='$dp', jurnal='$abs' where idbuku='$id'");
            header("location:dashboard_admin.vanray");
        }}
    } elseif ($a == 'bk') {
        $id = $_GET[ib];
        $kb = $_POST[kodebuku];
        $penerbit = $_POST[penerbit];
        $tahun = $_POST[tahun];
        $isbn = $_POST[isbn];
        $desc = $_POST[sinapsis];
        $file = $_FILES[gambar];
        if (empty($file[name])) {
            connect();
            $xx = query("update buku_detail set kodebuku='$kb', penerbit='$penerbit', tahun='$tahun', isbn='$isbn', sinapsis='$desc', status='Tersedia' where idbuku='$id'");
            header("location:dashboard_admin.vanray");
        } else {
            $abs = $file[name];
            $tmp = $file[tmp_name];
            $tipe = $file[type];

            if ($tipe != 'image/jpeg') {
                echo "<script>alert('$tipe, File harus berbentuk JPG.');
				window.location='admin.php?halaman=buku&ux=bk&ib=$id&pg=edit';
			</script>";
            } else {

                if (!empty($tmp)) {
                    move_uploaded_file($tmp, 'dokumen/bk/' . $abs);
                }
                connect();
                $xx = query("update buku_detail set kodebuku='$kb', penerbit='$penerbit', cover='$abs', tahun='$tahun', isbn='$isbn', sinapsis='$desc', status='Tersedia' where idbuku='$id'");
                header("location:admin_kelola_buku.vanray");
            }
        }
    }
}
// 3. Hapus Buku
if ($aksi == 'hapusbuku') {
    $a = $_GET[ux];
    $id = $_GET[ib];
    if ($a == 'bk') {
        query("delete from buku_detail where idbuku='$id'");
        query("delete from buku where idbuku='$id'");
        header('location:admin_kelola_buku.vanray');
    } elseif ($a == 'kp') {
        query("delete from kp where idbuku='$id'");
        query("delete from buku where idbuku='$id'");
        header('location:admin_kelola_buku.vanray');
    } elseif ($a == 'pp') {
        query("delete from pp where idbuku='$id'");
        query("delete from buku where idbuku='$id'");
        header('location:admin_kelola_buku.vanray');
    } elseif ($a == 'ta') {
        query("delete from ta where idbuku='$id'");
        query("delete from buku where idbuku='$id'");
        header('location:admin_kelola_buku.vanray');
    } elseif ($a == '') {
        query("delete from buku where idbuku='$id'");
        header('location:admin_kelola_buku.vanray');
    } else {
        header('location:admin_kelola_buku.vanray');
    }
}
// Kelola Akun
// 1. Tambah Akun
if ($aksi == 'tambahuser') {
    $a = $_POST[username];
    $b = $_POST[password];
    $c = $_GET[ux];
    $d = $_POST[nama];

    if ($c == 'mahasiswa') {
        query("insert into mahasiswa (username,password) values ('$a','$b')");
        header('location:admin_kelola_akun_mahasiswa.vanray');
    } elseif ($c == 'dosen') {
        query("update dosen set username='$a', password='$b' where iddosen='$d'");
        header('location:admin_kelola_akun_dosen.vanray');
    }
}
// 2. Edit Akun
if ($aksi == 'updateuser') {
    $a = $_POST[username];
    $b = $_POST[password];
    $c = $_GET[ux];
    $v = $_GET[id];

    if ($c == 'mahasiswa') {
        query("update mahasiswa set username='$a',password='$b' where idmahasiswa='$v'");
        header('location:admin_kelola_akun_mahasiswa.vanray');
    } elseif ($c == 'dosen') {
        query("update dosen set username='$a', password='$b' where iddosen='$v'");
        header('location:admin_kelola_akun_dosen.vanray');
    }
}
// 3. Hapus Akun
if ($aksi == 'hapususer') {
    $c = $_GET[ux];
    $v = $_GET[id];

    if ($c == 'mahasiswa') {
        query("delete from mahasiswa where idmahasiswa='$v'");
        header('location:admin_kelola_akun_mahasiswa.vanray');
    } elseif ($c == 'dosen') {
        query("UPDATE dosen SET username =NULL, PASSWORD=NULL WHERE iddosen='$v'");
        header('location:admin_kelola_akun_dosen.vanray');
    }
}
// -- Edit data sebelum menggunakan sistem
if ($aksi == 'simpandatauser') {
    $x = $_GET[ux];
    $a = $_POST[nama];
    $b = $_POST[username];
    $c = $_POST[password];
    $d = $_POST[alamat];
    $e = $_POST[nohp];
    $f = $_POST[tl];
    $g = $_POST[tgl];
    $h = $_POST[ayah];
    $i = $_POST[ibu];

    if ($x == 'dosen') {
        $id = $_SESSION[iddosen];
        $j = $_POST[nip];
        $file = $_FILES[gambar];
        if (empty($file[name])) {
            connect();
            $xx = query("update dosen set nama='$a', username='$b', password='$c', nip='$j',alamat='$d',nohp='$e',tempat_lahir='$f',tanggal_lahir='$g',status='Aktif' where iddosen='$id'");
            header("location:index.php");
        } else {
            $abs = $file[name];
            $tmp = $file[tmp_name];
            $tipe = $file[type];
            if ($tipe != 'image/jpeg') {
                echo "<script>alert('$tipe, File harus berbentuk JPG.');
				window.location='profile.vanray?ux=Dosen';
			</script>";
            } else {
                if (!empty($tmp)) {
                    move_uploaded_file($tmp, 'gambar/akun/' . $abs);
                    connect();
                    $xx = query("update dosen set nama='$a', username='$b', password='$c', nip='$j',alamat='$d',nohp='$e',foto='$abs',tempat_lahir='$f',tanggal_lahir='$g',status='Aktif' where iddosen='$id'");
                    header("location:index.php");
                }
            }
        }
    } elseif ($x == 'mahasiswa') {
        $id = $_GET[id];
        $j = $_POST[nim];
        $file = $_FILES[gambar];
        if (empty($file[name])) {
            connect();
            $xx = query("update mahasiswa set nama='$a', username='$b', password='$c', nim='$j',alamat='$d',nohp='$e',tempat_lahir='$f',tanggal_lahir='$g',nama_ayah='$h',nama_ibu='$i' where idmahasiswa='$id'");
            header("location:index.php");
        } else {
            $abs = $file[name];
            $tmp = $file[tmp_name];
            $tipe = $file[type];
            if ($tipe != 'image/jpeg') {
                echo "<script>alert('$tipe, File harus berbentuk JPG.');
				window.location='profile.vanray?ux=Dosen';
			</script>";
            } else {
                if (!empty($tmp)) {
                    move_uploaded_file($tmp, 'gambar/akun/'.$abs);
                }
                connect();
                $xx = query("update mahasiswa set nama='$a', username='$b', password='$c', nim='$j',alamat='$d',nohp='$e',foto='$abs',tempat_lahir='$f',tanggal_lahir='$g',nama_ayah='$h',nama_ibu='$i' where idmahasiswa='$id'");
                header("location:index.php");
            }
        }
    }
}

if ($aksi=='admincaribuku') {
$data=$_POST[q];
header("location:admin.php?halaman=buku&q=$data");
}

if($aksi=='pinjambuku'){
    $a=$_POST[kodepinjam];
    $b=$_POST[nama];
    $c=$_POST[tglkembali];
   query("insert into pinjam (kodepinjam,iddosen,tanggal_pinjam,tanggal_kembali,status) values ('$a','$b',Curdate(),'$c','Aktif')");
   $w=  query("select * from pinjam where kodepinjam='$a'");
   $b=  mysql_fetch_array($w);
   header("location:admin.php?halaman=pinjam&show=detail&ip=$b[idpinjam]");   
}

if($aksi=='bukudetailtambah'){
    $idp=$_GET[ip];
    $idb=$_POST[buku];
    query("insert into pinjam_detail (idpinjam,idbuku_detail) values ('$idp','$idb')");
    echo "<script>
    var r = confirm('Tambah Buku Lagi?');
    if (r == true) {
        window.location='admin.php?halaman=pinjam&show=detail&ip=$idp';
    } else {
        window.location='admin.php?halaman=pinjam';
    }
</script>";
    
}

if($aksi=='bukudetailedit'){
    $idp=$_GET[ip];
    $idb=$_POST[buku];
    query("insert into pinjam_detail (idpinjam,idbuku_detail) values ('$idp','$idb')");
    echo "<script>
    var r = confirm('Tambah Buku Lagi?');
    if (r == true) {
        window.location='admin.php?halaman=pinjam&show=edit&id=$idp';
    } else {
        window.location='admin.php?halaman=pinjam';
    }
</script>";
    
}

if($aksi=='hapusdetailbuku'){
    $id=$_GET[id];
    query("delete from pinjam_detail where idpinjam_detail='$id'");
    echo "<script>history.back();</script>";
}

if($aksi=='kembalibuku'){
    $kode=$_POST[kodepinjam];
    connect();
    $qdd=  mysql_fetch_array(mysql_query("select idpinjam from pinjam where kodepinjam='$kode'"));
    $ok=$qdd[idpinjam];
    query("insert into kembali values('','$ok',curdate())");
    echo "<script>window.history.back();</script>";
}