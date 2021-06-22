<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $query = "SELECT * FROM `produk_belgindo` WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$id])) {
        $row = $stmt->fetch();
        $output = (object)[
            "kategori" => $row['kategori_produk'],
            "gambarproduk" => $row['foto_produk'],
            "nama" => $row['nama_produk'],
            "deskripsi" => $row['deskripsi_produk']
        ];
        echo json_encode($output);
    } else {
        echo json_response(500, "Execute return false");
    }
} else {
    header('HTTP/2.0 404 Not Found');
}
