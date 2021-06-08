<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/backend_service/database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/services/functions.php";
session_start();
if (isset($_SESSION['username'])) {
    insert_logout($pdo, $_SESSION['id']);
    header("location: /admin/login/product/");
}else{
    header("location: /admin/");
}
?>