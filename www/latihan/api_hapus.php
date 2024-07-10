<?php 
include 'conn.php';

if (isset($_GET['id'])) {

        $sql = $conn->prepare("DELETE FROM produk WHERE id=?");
        $id = $_GET['id'];
        $sql->bind_param('i', $id);
        $sql->execute();
        if ($sql) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
        header("location:../page_tampildata.php");
        } else {
        }
        echo json_encode(array('RESPONSE' => 'FAILED'));
        
    }else {
     echo "GAGAL";
    }
?>