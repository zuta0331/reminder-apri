<?php
$id = $_GET['id'];
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 
 <body>
  <form action="update.php" method="post">
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   タイトル：<input type="text" name="new_title"><br>
   日付：<input type="text" name="new_date"><br>
   <input type="submit" value="決定">
  </form>
 </body>
</html>
