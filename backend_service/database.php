<?php 
$host = "ftp.haftcorpindo.com";
$db = "hafk8743_belgindo";
$user = "hafk8743";
$pass = "XkUKw1P82mgx59";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOExecption($e->getMessage(), (int)$e->getCode());
}
//header("location: index.php");
?>