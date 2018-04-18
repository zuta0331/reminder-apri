<?php
$host = "mysql626.db.sakura.ne.jp";
$user = "zuta";
$pass = "fragment15315";
$db   = "zuta_sample";

$param = "mysql:dbname=".$db.";host=".$host;
$pdo = new PDO($param, $user, $pass);
$pdo->query("SET NAMES utf8_general_ci");

if (isset($_POST["title"]) and isset($_POST["date"]))
{
    $stmt = $pdo->prepare("INSERT INTO reminder(title,remind_date) VALUES(:DB_title,:DB_date)");//値を受け取るor入れる時はprepareを使う。つまり、値を使用する時。
    $stmt->bindValue(':DB_title',$_POST["title"]);
    $stmt->bindValue(':DB_date',$_POST["date"]);
    $stmt->execute();//SQLを実際に実行する。
}


$stmt = $pdo->query("SELECT * FROM reminder;");
//$row = $stmt->fetch();//fetch()で全部のデータを取得。本来は()の中に取得方法を指定する。指定しないなら全部？

unset($pdo);
?>

<html>
 <head>
  <title> 自作リマインダー_一覧画面 </title>
  <meta http-equiv="Content-Type" content="text/html; charset= UTF-8">
 </head>
 
 <body>
  <table border="1">
   <tr>
    <th>タイトル</th>
    <th>期日</th>
    <th></th>
    <th><a href="newdata.php">新規作成</a></th>
   </tr>
   <tr>
    <?php 
    //データベース内のデータを全て表示させたい。
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    /* データの数＝処理数。fetchは「1つのデータを取得」するので、
     * 上記のwhile文は「全てのデータを取得」するまでくり返す。
     * 例えばデータが3つ入っていれば、1回ずつ処理して、合計3回まで処理する。
     */
    {
        echo "<tr>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['remind_date']."</td>";
        echo "<td><a href=\"input_update.php?id=".$row['id'].
        "\">[変更]</a>&nbsp;<a href=\"delete.php?id=".
        $row['id']."\" onclick=\"return confirm('削除してもよろしいですか?')\" >[削除]</a></td>";
        echo "</tr>";
    }
    
    ?>
   </tr>
  </table>
 </body>
</html>