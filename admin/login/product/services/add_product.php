<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
function uploadProduct()
{
    global $error_check;
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $tmpFileName = $_FILES['image']['tmp_name'];
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
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;
    $location = $_SERVER["DOCUMENT_ROOT"].'/belgindo1/ourwork/product/' . $newFileName;
    move_uploaded_file($tmpFileName, $location);
    return $newFileName;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $kategori = $_POST["kategori"];
    $gambarproduct = uploadProduct();
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];

    $query="INSERT INTO `produk_belgindo`(`id`, `kategori_produk`, `nama_produk`, `foto_produk`, `deskripsi_produk`, `status`) VALUES (default,?,?,?,?,1)";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$kategori,$nama,$gambarproduct,$deskripsi]);
    echo show_product($pdo);
}



?>