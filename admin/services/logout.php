<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/admin/services/functions.php";
    session_start();
    insert_logout($pdo, $_SESSION['id']);
    session_destroy();
    header('Location: http://127.0.0.1/belgindo1/admin/');
?>