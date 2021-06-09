<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/belgindo1/backend_service/database.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];

    $password = $_POST['password'];

    $result= [
        "status" => 1,
        "error" => " ",
        'redirect' => "/belgindo1/admin/login/index.php"
    ];

    if ($username == '' || $password == '') {
        header("HTTP/1.1 400 Bad Request");
        $result['status'] = 0;
        $result['error'] = 'username & Password Must Have Value!';
    }

    $sql = "SELECT * FROM `admin` WHERE `username` = ? AND `password` = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $status = "";
    $id_admin;
    $row_count = $stmt->rowCount();

    if ($row_count >= 1) {
        $result['redirect'] = '/belgindo1/admin/login/index.php';
        $user = $stmt->fetch();
        session_start();
        $_SESSION['id'] = $user['id_admin'];
        $id_admin = $user['id_admin'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $status = "success";
    } else {

        header("HTTP/1.1 400 Bad Request");

        $result['status'] = 0;
        $id_admin = -1;
        $result['error'] = 'Wrong Username or Password';
        $status = "Failed";
    }
    $query_activity = "INSERT INTO `login_activity` VALUES (NULL,?,?,NOW(),DATE_ADD(NOW(), INTERVAL 5 MINUTE),?)";
    $stmt_activity = $pdo->prepare($query_activity);
    $stmt_activity->execute([$id_admin, $username , $status]);
    $_SESSION['log_id'] = $pdo->lastInsertId();
    echo json_encode($result);

}