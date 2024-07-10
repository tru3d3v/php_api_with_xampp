<?php
include 'conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $tipe_produk = $_POST['tipe_produk'];
    $stok = $_POST['stok'];
    $sql = $conn->prepare("UPDATE produk SET nama_produk=?, tipe_produk=?,harga=?, stok=? WHERE id=?");
    $sql->bind_param('ssddd', $nama_produk, $tipe_produk, $harga, $stok,$id);
    $sql->execute();
        if ($sql) {   
        header("location:../page_tampildata.php");
        }else{
            echo json_encode(array('RESPONSE' => 'SUCCESS'));

        }
    echo json_encode(array('RESPONSE' => 'FAILED'));
    } else {
    
        echo "GAGAL";
    } 

?>