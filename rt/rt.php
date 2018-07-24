<?php
session_start();
class Rt
{
    //atribut gaes
    var $id_rt;
    var $nama_rt;
    var $status;

    //menampilkan
    public function get_rt(){
        include ('../koneksi.php');
        $rt = $_mysqli->query("SELECT * FROM rt");
        return $rt;
    }

    //menampilkan id
    public function get_id(){
        include ('../koneksi.php');
        $aga = $_mysqli->query("SELECT MAX(id_rt) + 1 as id_new FROM rt");
        $id_rt = mysqli_fetch_array($aga);
        return($id_rt);
    }
 
    //tambah rt
    public function tambah(){
        $id = $_POST['id_rt'];
        $nama = $_POST['nama_rt'];
        $rw = $_POST['nama_rw'];
        include ('../koneksi.php');
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO rt (id_rt, nama_rt, nama_rw, status) VALUES ('$id', '$nama','$rw', 1)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama</strong> Berhasil ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }else{
                $res = $_mysqli->query("ROLLBACK");
                var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nama</strong> gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }
        }
    }

    //hapus rt
    public function hapus(){
        $id = $_GET['hapus'];
        include ('../koneksi.php');
        $nama   = $_mysqli->query("SELECT nama_rt FROM rt WHERE id_rt = '$id'");
        $nm = mysqli_fetch_array($nama);
        $nw = $nm['nama_rt'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM rt WHERE id_rt = '$id'");
        if ($hapus) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nw</strong> Berhasil dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }else{
                $res = $_mysqli->query("ROLLBACK");
                var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nw</strong> gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }
        }
    }

    //edit rt
    public function edit(){
        include ('../koneksi.php');
        $id_rt = $_GET['edit'];
        $ag = $_mysqli->query("SELECT * FROM rt WHERE id_rt = '$id_rt'");
        $rt = mysqli_fetch_array($ag);
        return $rt;
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $id_rt = $_POST['id_rt'];  
        $nama_rt = $_POST['nama_rt'];
        $nama_rw = $_POST['nama_rw'];
        $_mysqli->query("START TRANSACTION;");
        $edit = $_mysqli->query("UPDATE rt SET nama_rt= '$nama_rt', nama_rw= '$nama_rw' WHERE id_rt = '$id_rt'");
        if ($edit) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama_rt</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }else{
                $res = $_mysqli->query("ROLLBACK");
                var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nama_rt</strong> gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=6');
                return TRUE;
            }
        }
    }

    //detail 
    public function detail_rt(){
        include ('../koneksi.php');
        $id_rt = $_GET['detail'];
        $rt = $_mysqli->query("SELECT * FROM rt , kk
                                        WHERE rt.id_rt = kk.rt
                                        AND rt.id_rt = '$id_rt'");
        return $rt;

    }

    //judul
    public function get_judul(){
        include ('../koneksi.php');
        $id_rt = $_GET['detail'];
        $j = $_mysqli->query("SELECT nama_rt FROM rt
                                        WHERE id_rt = '$id_rt'");
        $judul = mysqli_fetch_array($j);
        return $judul;

    }
}
 ?>