<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Stock Manager</title>
  <link rel="stylesheet" href="../bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="nav">
    <ul>
      <li><a href="http://139.62.210.151/~n00900355/cop4813/index.html">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li style="float:right"><a href="###">
        <?php
          $currentUser = $_SESSION["currentUser"];
          if($currentUser === "" || $currentUser === null) {
            echo "ERROR";
            header("Location: index.php");
          }
          echo "Welcome, ";
          echo $_SESSION["currentUser"];
          //fclose($fp);
        ?>
        </a>
       </li>
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12" align="center">
        <h1>Stock Portfolio</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12" align="center">
        <form action="add.php" class="form-inline" method="post">
          <div class="form-group">
            <div class="input-group" style="min-width: 500px">
              <div class="input-group-addon">Add: </div>
              <input type="text" class="form-control" name="company" placeholder="Stock">
              <input type="text" class="form-control" name="desiredShares" placeholder="Amount">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-xs-12" align="center">
        <form action="modify.php" class="form-inline" method="post">
          <div class="form-group">
            <div class="input-group" style="min-width: 500px">
              <div class="input-group-addon">Modify: </div>
              <input type="text" class="form-control" name="mCompany" placeholder="Stock">
              <input type="text" class="form-control" name="mDesiredShares" placeholder="Amount">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-xs-12" align="center">
        <form action="delete.php" class="form-inline" method="post">
          <div class="form-group">
            <div class="input-group" style="min-width: 500px">
              <div class="input-group-addon">Delete: </div>
              <input type="text" class="form-control" name="dCompany" placeholder="Stock">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-xs-12" style="padding: 50px;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Symbol</th>
              <th scope="col">Price</th>
              <th scope="col">Shares</th>
              <th scope="col">Total Value</th>
            </tr>
          </thead>
          <tbody>
            <!--tr>
              <th scope="row">TEST</th>
              <td>$123.00</td>
              <td>41</td>
              <td>$9999.00</td>
            </tr-->
            <?php
            $my_file = 'myStocks.dat';
            $myStocks = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
            echo $mycsv;
            while (($line = fgets($myStocks, 4096)) !== FALSE) {
              $checkTick = strtok($line, "|");
              $checkBought = strtok("|");
              $mycsv = fopen("http://finance.yahoo.com/d/quotes.csv?s=$checkTick&f=sl1d1t1c1ohgv&e=.csv", "r");
              $col = fgetcsv($mycsv, 1000, ",");
              $checkCost = number_format((float)$col[1], 2, '.', '');
              $totalVal = $checkCost * $checkBought;
              $totalVal = number_format((float)$totalVal, 2, '.', '');
              echo "<tr>";
              echo '<th scope="row">';
              echo $checkTick;
              echo '</th>';
              echo '<td>$';
              echo $checkCost;
              echo '</td>';
              echo '<td>';
              echo $checkBought;
              echo '</td>';
              echo '<td>$';
              echo $totalVal;
              echo '</td>';
              echo "</tr>";
              fclose($mycsv);
            }
            fclose($myStocks);

            ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>

</body>

</html>
