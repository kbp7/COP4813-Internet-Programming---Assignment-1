<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Movie</title>
  <link rel="stylesheet" href="../bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  	$mysql_access = mysql_connect(localhost, 'n00900355', 'fall2017900355');

  	if(!$mysql_access)
  	{
  		die('Unable to connect: ' . mysql_error());
  	}

  	mysql_select_db('n00900355');

    $movieID = $_GET['movieID'];
    $_SESSION["editMovieID"] = $movieID;
  	$query = "SELECT * FROM Movies WHERE movieID=" . $movieID;
  	$result = mysql_query($query, $mysql_access);

    if(!$result)
  	{
  		die("Error processing data: ". mysql_error());
  	}

    $row = mysql_fetch_row($result);
    $editMovieID = $row[0];

    mysql_close($mysql_access);
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
        <center><h2>Change Backlog Record</h2></center>

        <form action="update.php" method="get">
          <div class="form-group">
            <label for="movieTitle">Movie Title</label>
            <input type="text" class="form-control" name="movieTitle" id="movieTitle" placeholder="New Title">
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
            <input type="text" class="form-control" name="directorName" id="directorName" placeholder="New Director">
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
          <button type="submit" class="btn btn-default" method="get">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
