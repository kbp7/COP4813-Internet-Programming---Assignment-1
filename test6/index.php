<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Movie Backlog</title>
  <link rel="stylesheet" href="../bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    $mysql_access = mysql_connect(localhost, 'n00900355', 'fall2017900355');

    //check for mysql error
  	if(!$mysql_access)
  	{
  		die('Could not connect: ' . mysql_error());
  	}

  	mysql_select_db('n00900355');

  	$query = "SELECT * FROM Movies";

  	$result = mysql_query($query, $mysql_access);
    if(!$result)
  	{
  		die("Error processing data: ". mysql_error());
  	}
  ?>
</head>

<body>
  <div class="nav">
    <ul>
      <li><a href="http://139.62.210.151/~n00900355/cop4813/index.html">Home</a></li>
      <li><a href="https://github.com/kbp7">Github</a></li>
      <li><a href="http://139.62.210.151/~n00900355/cop4813/test.html">Testing Grounds</a></li>
      <li style="float:right"><a href="http://139.62.210.151/~n00900355/cop4813/assign1/index.html">About</a></li>
    </ul>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <center><h2>Movie Backlog</h2></center>

        <form action="add.php" method="get">
          <div class="form-group">
            <label for="movieTitle">Movie Title</label>
            <input type="text" class="form-control" name="movieTitle" id="movieTitle" placeholder="Enter Title of Movie">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Year Released</label>
            <select class="form-control" name="releaseYear" id="releaseYear">
              <option value="2017">2017</option>
              <option value="2016">2016</option>
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              <option value="2012">2012</option>
              <option value="2011">2011</option>
              <option value="2010">2010</option>
            </select>
          </div>
          <div class="form-group">
            <label for="directorName">Director</label>
            <input type="text" class="form-control" name="directorName" id="directorName" placeholder="Enter Name of Director">
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="homeRelease" id="homeRelease" value="Yes"> Home Release
            </label>
          </div>
          <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="streaming" id="streaming" value="Yes"> Available for Streaming
          </label>
          </div>
          <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="watched" id="isWatched" value="No" checked> Not Watched
            <input class="form-check-input" type="radio" name="watched" id="isWatched" value="Yes"> Watched
          </label>
          </div>
          <button type="submit" class="btn btn-default" method="get">Add</button>
        </form>
      </div>
    </div>

    <div class="row" style="margin-top: 50px;">
      <div class="col-xs-12">
        <form action='' name='myForm' method='get'>
        <?php
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
        		echo "<td><input type='radio' name='movieID' value='$movieID'></td>";
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
        <br>
        <input type='button' class="btn btn-default" value='Change Record' onClick='changeRecord()'>
      	<input type='button' class="btn btn-default" value='Delete Record' onClick='deleteRecord()'>
        <a class="btn btn-primary" href="erdiagram.jpg" role="button">ER Diagram</a>
        </form>
      </div>
    </div>

  </div>

<script>
	function changeRecord()
	{
		document.myForm.action='change.php';
		document.myForm.submit();
	}
  function deleteRecord()
  {
          document.myForm.action='delete.php';
          document.myForm.submit();
  }
</script>
</body>
</html>
