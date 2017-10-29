<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
  <?php
  $stock = strtoupper($_POST['mCompany']);
  $shares = $_POST['mDesiredShares'];
  $stock = str_replace("\n", "", $stock);
  $shares = str_replace("\n", "", $shares);
  echo $stock;
  echo $shares;

  //$row = 1;
  /*
    $my_file = 'myStocks.dat';
    $myStocks = fopen($my_file, 'a+') or die('Cannot open file:  '.$my_file);
    $notExists = TRUE;
    while (($line = fgets($myStocks, 4096)) !== FALSE) {
      echo "line: ". $line;
      $checkTick = strtok($line, "|");
      echo $checkTick;
      if($checkTick === $stock) {
        echo "found it";
        $notExists = FALSE;
        file_put_contents($my_file, str_replace($line . "\r\n", "", file_get_contents($my_file)));
      }
    }
    if($notExists) {
      //error message
    }
    fclose($myStocks);
*/

  $data = file("myStocks.dat");
  $out = array();
  foreach($data as $line) {
   if (strpos($line, $stock) === false) {
       $out[] = $line;
   }
   else {
     $line = $stock . '|' . $shares . "\n";
     $out[] = $line;
   }
  }
  $fp = fopen("myStocks.dat", "w+");
  flock($fp, LOCK_EX);
  foreach($out as $line) {
   fwrite($fp, $line);
  }
  flock($fp, LOCK_UN);
  fclose($fp);

  header("Location: admin.php");
  ?>
</body>
</html>
