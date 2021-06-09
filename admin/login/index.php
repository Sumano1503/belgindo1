<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
session_start();
if (isset($_SESSION['username'])) {
    insert_logout($pdo, $_SESSION['id']);
    header("location: /belgindo1/admin/login/product/");
}else{
    header("location: /belgindo1/admin/");
}
?>