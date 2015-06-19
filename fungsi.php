<?php
error_reporting(0);
session_start();
global $koneksi;

function connect(){
    $server = 'localhost';
    $username='root';
    $password='';
    $database='siputri';
    
    $koneksi=  mysql_connect($server,$username,$password);
    if(!$koneksi){
        die('Koneksi Gagal :'.mysql_errno());
    } else {
        mysql_select_db($database,$koneksi);    
    }
}

function query($kueri){
    connect();
    $query=  mysql_query("$kueri");
    return $query;
}

function ceklogin($username, $password){
    connect();
    $dosen=  query("select * from dosen where username='$username' AND password='$password'");
    $hasil=  mysql_num_rows($dosen);
    
    if ($hasil > 0){
        $getdata=  mysql_fetch_array($dosen);
        $_SESSION[iddosen]=$getdata[iddosen];
        $_SESSION[username]=$getdata[username];
        $_SESSION[password]=$getdata[password];
        $_SESSION[nama]=$getdata[nama];
        $_SESSION[tipe]='Dosen';
        echo "<script>alert('Anda berhasil login. $username');
                    window.location='dashboard_dosen.vanray';
                    </script>";
    } else {
        connect();
        $mhs=  query("select * from mahasiswa where username='$username' AND password='$password'");
        $dm=  mysql_num_rows($mhs);
        
        if ($dm > 0){
            $getdata=  mysql_fetch_array($mhs);
            $_SESSION[idmahasiswa]=$getdata[idmahasiswa];
            $_SESSION[username]=$getdata[username];
            $_SESSION[password]=$getdata[password];
            $_SESSION[nama]=$getdata[nama];
            $_SESSION[tipe]='Mahasiswa';
            echo "<script>alert('Anda berhasil login. $username');
                    window.location='dashboard_mahasiswa.vanray';
                    </script>";
            
        } else {
        connect();
        $ad=  query("select * from admin where username='$username' AND password='$password'");
        $am=  mysql_num_rows($ad);
        
            if($am > 0){
                $getdata=  mysql_fetch_array($ad);
                $_SESSION[idadmin]=$getdata[idadmin];
                $_SESSION[username]=$getdata[username];
                $_SESSION[password]=$getdata[password];
                $_SESSION[nama]=$getdata[nama];
                $_SESSION[tipe]='Admin';
                echo "<script>alert('Anda berhasil login. $username');
                    window.location='dashboard_admin.vanray';
                    </script>";  
            } else {
                    echo "<script>alert('Gagal Login. Pastikan Data yang dimasukkan sudah benar');
                    window.location='index.php';
                    </script>";  
            }
        }
        
        
    }
}

function getBulan($bln){
    switch ($bln){
        case 1: 
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
        
    }
} 
        
date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

function ceksession(){
    if(empty($_SESSION[username]) && empty($_SESSION[password] && empty($_SESSION[tipe]))){
     $a=   header('location:masuk_dulu');
     return $a;
    }
    elseif ($_SESSION[tipe]=='Mahasiswa') {
    $a=    header('location:dashboard_mahasiswa.vanray');
    return $a;
    
    }   
    elseif ($_SESSION[tipe]=='Admin') {
    $a= header('location:dashboard_admin.vanray');
    return $a; 
    }
    elseif ($_SESSION[tipe]=='Dosen') {
    $a=    header('location:dashboard_dosen.vanray');
    return $a; 
    }
 else {
      header('location:masuk_dulu');  
    }
}

function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;  
    
}

function autokodepinjam() {
    $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = '' ;
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($var, $num, 1);
        $code = $code . $tmp;
        $i++;
        }
    return $code;
}
				

?>