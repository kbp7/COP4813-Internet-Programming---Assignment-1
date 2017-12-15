<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
  <?php
  $stock = strtoupper($_POST['company']);
  $bought = $_POST['desiredShares'];
  $stock = str_replace("\n", "", $stock);

  //$row = 1;
  if (($handle = fopen("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sl1d1t1c1ohgv&e=.csv", "r")) !== FALSE) {
    $data = fgetcsv($handle, 1000, ",");
    $tickName = $data[0];
    $cPrice = $data[1];
    $tValue = $cPrice * $bought;
    $my_file = 'myStocks.dat';
    $myStocks = fopen($my_file, 'a+') or die('Cannot open file:  '.$my_file);
    $notExists = TRUE;
    while (($line = fgets($myStocks, 4096)) !== FALSE) {
      echo "line: ". $line;
      $checkTick = strtok($line, "|");
      echo $checkTick;
      if($checkTick === $stock) {
        $notExists = FALSE;
      }
    }
    if($notExists) {
      fwrite($myStocks, $tickName . '|' . $bought . "\n");
    }
    fclose($myStocks);
  /*
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {


        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }

    }
  */
    fclose($handle);
  }

  header("Location: admin.php");
  ?>
</body>
</html>
