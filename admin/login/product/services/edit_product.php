<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
session_start();
function uploadProduct()
{
    global $error_check;
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $tmpFileName = $_FILES['file']['tmp_name'];
    if ($fileError === 4) {
        $error_check = "4";
        return false;
    }
    $validFileExtensions = ['jpg', 'jpeg', 'png', 'HEIC', 'image'];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));
    if (!in_array($fileExtension, $validFileExtensions)) {
        $error_check = "5";
        return false;
    }
    if ($fileSize > 10000000) { //bytes
        $error_check = "6";
        return false;
    }
    unlink($_SERVER['DOCUMENT_ROOT'] . '/belgindo1/ourwork/product/' . $_POST['srcimg']);
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;
    $location = $_SERVER["DOCUMENT_ROOT"].'/belgindo1/ourwork/product/' . $newFileName;
    move_uploaded_file($tmpFileName, $location);
    return $newFileName;
}
if (isset($_SESSION['id']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $gambarproduct;
    if ($_FILES['file']['error'] === 4) {
        $gambarproduct = $_POST['srcimg'];
    } else {
        $gambarproduct = uploadProduct();
    }
    $kategori = $_POST["kategori"];
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $sql = "UPDATE `produk_belgindo` SET `kategori_produk` = ?, `nama_produk` = ?, `foto_produk` = ?, `deskripsi_produk` = ? WHERE `id` = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$kategori, $nama, $gambarproduct, $deskripsi, $id])) {
        echo show_product($pdo);
    } else {
        echo json_response(400, "Internal Server Error");
    }
} else {
    header("HTTP/1.0 404 Not Found");
}
