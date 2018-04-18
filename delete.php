<?php
//$id=$_GET['id'];
//echo $id;

$host = "mysql626.db.sakura.ne.jp";
$user = "zuta";
$pass = "fragment15315";
$db   = "zuta_sample";

$param = "mysql:dbname=".$db.";host=".$host;
$pdo = new PDO($param, $user, $pass);
$pdo->query('SET NAMES _general_ci');

$stmt = $pdo->prepare("DELETE FROM reminder WHERE id=:DB_id");
$stmt->bindValue(':DB_id',$_GET['id']);
$stmt->execute();

unset($pdo);
header('Location: index.php');
exit;
?>