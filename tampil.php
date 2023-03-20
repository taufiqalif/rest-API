<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$api = http_request("http://localhost/rest_api/api/api_tampil.php");
$data = json_decode($api, TRUE); 
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tampil Barang</title>
        <link rel="stylesheet" href="readapi/layout/css/style.css"> </head>

    <body>
        <div class="wrap">
            <div class="header">
                <h1>REAT API</h1> 
            </div>
            <div class="menu">
                <ul>
                    <li><a href="">Home</a></li>
                </ul>
            </div>
            <div class="badan">
                <div class="sidebar">
                    <ul>
                        <li><a href="tampil.php">Produk</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
                <div class="content">
                    <p>DATA PRODUK</p> <a href="tambah.php">Tambah Data</a>
                    <table style="width:100%">
                        <tr>
                            <td>NO. </td>
                            <td>Kode Produk</td>
                            <td>Nama</td>
                            <td>Tipe Produk</td>
                            <td>Aksi</td>
                        </tr>
                        <?php $nomor = 1;  ?>
                        <?php foreach ($data as $dt) : ?>
                            <tr>
                                <td>
                                    <?= $nomor; ?>
                                </td>
                                <td>
                                    <?= $dt["id"] ?>
                                </td>
                                <td>
                                    <?= $dt["nama_produk"] ?>
                                </td>
                                <td>
                                    <?= $dt["tipe_produk"] ?>
                                </td>
                                <td colspan="2"> 
                                    <a href="edit.php?id=<?= $dt['id'] ?>">Edit</a> 
                                <a href="./api/api_hapus.php?id=<?= $dt['id'] ?>">Hapus</a> 
                            </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <p>©️CopyRight <?= date('Y') ?> Universitas Pelita Bangsa</p>
            </div>
        </div>
    </body>
    </html>