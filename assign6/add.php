<?php

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

	$mysql_access = mysql_connect(localhost, 'n00900355', 'fall2017900355');
  
  $stmt = mysqli_prepare($dbc, "SELECT * FROM users WHERE username = ? AND password = ?");
  mysqli_stmt_bind_param($stmt, "s", $userName);
  mysqli_stmt_bind_param($stmt, "s", $userPass);
  mysqli_stmt_execute($stmt);
  $row = mysqli_stmt_fetch($stmt);

  //check for mysql error
	if(!$mysql_access)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('n00900355');

	$query = "INSERT INTO Movies (movieTitle, releaseYear, directorName, homeRelease, streaming, watched";
	$query = $query . ") VALUES ('$movieTitle', '$releaseYear', '$directorName', '$homeRelease', '$streaming', '$watched')";

	$result = mysql_query($query, $mysql_access);
  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("SUCCESS");
	//Close connection
	mysql_close($mysql_access);
	header('Location: index.php');

?>
