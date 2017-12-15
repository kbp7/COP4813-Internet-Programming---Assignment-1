<?php
  $year = $_GET['selection'];

  $config = parse_ini_file('../database.ini');
  $mysql_access = mysql_connect('localhost', $config['username'], $config['password']);
  if (!$mysql_access)
  {
    echo "Connection failed.";
    exit;
  }
  mysql_select_db($config['db']);
  if($year === 'all') {
    $query = "Select * from Movies order by releaseYear";
  }
  else { $query = "Select * from Movies where releaseYear=" . $year; }
  $result = mysql_query($query);

  echo "<table>";

  echo "<th></th><th>Title</th><th>Year Released</th><th>Director</th><th>Home Release</th><th>Streaming</th><th>Watched</th>";

  while ($row = mysql_fetch_row($result))
  {
    $movieID = $row[0];
    $movieTitle = $row[1];
    $releaseYear = $row[2];
    $directorName = $row[3];
    $homeRelease = $row[4];
    $streaming = $row[5];
    $watched = $row[6];

    echo "<tr>";
    //echo "<td><input type='radio' name='movieID' value='$movieID'></td>";
    echo "<td> </td>";
    echo "<td>$movieTitle</td>";
    echo "<td>$releaseYear</td>";
    echo "<td>$directorName</td>";
    echo "<td>$homeRelease</td>";
    echo "<td>$streaming</td>";
    echo "<td>$watched</td>";
    echo "</tr>";
  }
  echo "</table>";
  mysql_close($mysql_access);

?>
