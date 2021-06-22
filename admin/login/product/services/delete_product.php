<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
session_start();

if (isset($_SESSION['id']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $sql = "UPDATE `produk_belgindo` SET `status` = 0 WHERE `id` = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        echo show_product($pdo);
    } else {
        echo json_response(400, "Internal Server Error");
    }
} else {
    header("HTTP/1.0 404 Not Found");
}