<?php
	$mysql_access = mysql_connect(localhost, 'n00900355', 'fall2017900355');

	if(!$mysql_access)
	{
		die('Unable to connect: ' . mysql_error());
	}

	mysql_select_db('n00900355');
  $movieID = $_GET['movieID'];
	$query = "DELETE FROM Movies WHERE movieID=" . $movieID;
	$result = mysql_query($query, $mysql_access);

  if(!$result)
	{
		die("Error processing data: ". mysql_error());
	}
  echo ("SUCCESS");

	mysql_close($mysql_access);
	header('Location: index.php');

?>
