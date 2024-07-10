<?php

function loadJSON($Obj, $json)
{
    $dcod = json_decode($json);
    $prop = get_object_vars ( $dcod );
    foreach($prop as $key => $lock)
    {
        if(property_exists ( $Obj ,  $key ))
        {
            if(is_object($dcod->$key))
            {
                loadJSON($Obj->$key, json_encode($dcod->$key));
            }
            else
            {
                $Obj->$key = $dcod->$key;
            }
        }
    }
    return $Obj;
}

function http_request($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
return $output;
}
$json = http_request("http://apache/api_edit.php?id=".$_GET["id"]);
//print_r($json);

//$data = json_decode($data);
$data = json_decode($json, true);



//var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
<link rel="stylesheet" href="layout/css/style.css"> </head>
<body>
<div class="wrap">
<div class="header">
<h1>STTI API</h1> </div>
<div class="menu">
<ul>
<li><a href="">Home</a></li>
</ul>
</div>
<div class="badan">
<div class="sidebar">
<ul>
<li><a href="../page_tampildata.php">Produk</a></li>
<li><a href="../about.php">About</a></li>
</ul>
</div>
<div class="content">
<p> <a href="../page_tampildata.php">Kembali</a> </p>
<div id="stylish" class="myform">
<h1>EDIT produk</h1>
<p>form ini digunakan untuk edit produk</p>
<form action="../api_ubah.php" method="post"
id="form">
<div class="form-group">
<label for="">Kode produk</label>
<input type="text" value="<?=$data["id"]
?>" name="id" id="id" placeholder="Kode Produk"> </div>
<div class="form-group">
<label for="">Nama produk</label>
<input type="text" value="<?= $data['nama_produk']?>" name="nama_produk" id="nama_produk" placeholder="Nama
Produk"> </div>
<div class="form-group">
<label for="">Tipe produk</label>
<input type="text" value="<?= $data["tipe_produk"] ?>" name="tipe_produk" id="tipe_produk" placeholder="Tipe
Produk"> </div>
<div class="form-group">
<label for="">Harga</label>
<input type="text" value="<?= $data["harga"] ?>" name="harga" id="harga" placeholder="Harga"> </div>
<div class="form-group">
<label for="">Stok</label>
<input type="text" value="<?= $data["stok"] ?>" name="stok" id="stok" placeholder="Stok"> </div>
<div class="form-group">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
<div class="clear"></div>
<div class="footer">
<p> Sekolah Tinggi Teknologi Indonesia</p>
</div>
</div>
</body>
</html>