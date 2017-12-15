<?php
  session_start();
	$mysql_access = mysql_connect(localhost, 'n00900355', 'fall2017900355');

	if(!$mysql_access)
	{
		die('Unable to connect: ' . mysql_error());
	}

	mysql_select_db('n00900355');
  $movieID = $_SESSION["editMovieID"];
  $movieTitle = $_GET['movieTitle'];
	$releaseYear = $_GET['releaseYear'];
	$directorName = $_GET['directorName'];
  if ($_GET['homeRelease'] == 'Yes') {
    $homeRelease = 'Yes';
  }
  else {
    $homeRelease = 'No';
  }
  if ($_GET['streaming'] == 'Yes') {
    $streaming = 'Yes';
  }
  else {
    $streaming = 'No';
  }
	$watched = $_GET['watched'];

  //$query = "INSERT INTO Movies (movieTitle, releaseYear, directorName, homeRelease, streaming, watched";
	//$query = $query . ") VALUES ('$movieTitle', '$releaseYear', '$directorName', '$homeRelease', '$streaming', '$watched')";
	$query = "UPDATE Movies SET movieTitle='$movieTitle', releaseYear='$releaseYear', directorName='$directorName', homeRelease='$homeRelease', ";
  $query = $query . "streaming='$streaming', watched='$watched' WHERE movieID='$movieID'";
	$result = mysql_query($query, $mysql_access);

  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("update success");

	mysql_close($mysql_access);
  session_destroy();
	header('Location: index.php');

?>
<a href="index.php">Back</a>
