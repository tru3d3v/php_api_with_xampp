<?php
include 'conn.php';

if (isset($_GET['id'])) {
        $stmt = $conn->prepare("SELECT * FROM produk WHERE id=? ORDER BY id ASC");
        $id = $_GET['id'];
        $stmt->bind_param('i',$id);
        $stmt->execute();

       // $myArray = array();
        $hasil = $stmt->get_result();
        //printf("%d row .\n", $stmt->affected_rows);

       // $myArray = $users;
        while ($users = $hasil->fetch_array(MYSQLI_ASSOC)) {
            echo json_encode($users);
        }
    }else {
        echo "data tidak ditemukan";
    }
?>