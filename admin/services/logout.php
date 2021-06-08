<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/backend_service/database.php";
    require $_SERVER['DOCUMENT_ROOT']."/admin/services/functions.php";
    session_start();
    insert_logout($pdo, $_SESSION['id']);
    session_destroy();
    header('Location: http://127.0.0.1/belgindo1/admin/');
?>