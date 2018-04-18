<?php
$host = "mysql626.db.sakura.ne.jp";
$user = "zuta";
$pass = "fragment15315";
$db   = "zuta_sample";

$param = "mysql:dbname=".$db.";host=".$host;
$pdo = new PDO($param, $user, $pass);
$pdo->query('SET NAMES _general_ci');

$stmt = $pdo->prepare("UPDATE reminder SET title=:DB_title,remind_date=:DB_date WHERE id = :DB_id");
$stmt->bindValue(':DB_id',$_POST['id']);//上記のUPDATE文の「:id」の値をここで決定する。
$stmt->bindValue(':DB_title', $_POST['new_title']);//上記のUPDATE文の「:title」の値をここで決定する。
$stmt->bindValue('DB_date', $_POST['new_date']);
$stmt->execute();

$title = $_POST['new_title'];
$id = $_POST['id'];

//echo $id;
//echo $title;



unset($pdo);
header("Location: index.php");//画面遷移処理。画面繊維してもこのスクリプトは終了されていない。
exit;//スクリプト処理を終了させる。exitの後に処理文があっても処理がされない。

?>

