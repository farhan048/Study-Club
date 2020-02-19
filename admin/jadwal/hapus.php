<?php
include '../../koneksi.php';

$id= $_GET["id"]; 
function hapus($id){
    // untuk memanggil variabel koneksi
    global $koneksi;
    $hapus="DELETE FROM jadwal WHERE id_jadwal='$id'";
    mysqli_query($koneksi,$hapus);
    return mysqli_affected_rows($koneksi);
    
}
if (hapus($id) > 0) {
    echo " 
        <script>
            alert('Data Berhasil Di Hapus')
            document.location.href='jadwal.php';
        </script>
        ";
    }else {
        echo " 
        <script>
            alert('Data Gagal Di Hapus')
            document.location.href='jadwal.php';
        </script>
        ";
}
?>