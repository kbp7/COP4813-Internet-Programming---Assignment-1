<html>

<head>
  <title>Movie Backlog - Sorting</title>
  <link rel="stylesheet" href="../bootstrap.min.css"></link>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../style.css"></link>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <script language="javascript" type="text/javascript">
  <!--
  window.onload = function() {
    autoDisplay();
  };
  //Browser Support Code
  function ajaxFunction(){
  	var ajaxRequest;  // The variable that makes Ajax possible!

  	try{
  		// Opera 8.0+, Firefox, Safari
  		ajaxRequest = new XMLHttpRequest();
  	} catch (e){
  		// Internet Explorer Browsers
  		try{
  			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
  		} catch (e) {
  			try{
  				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
  			} catch (e){
  				// Something went wrong
  				alert("Your browser broke!");
  				return false;
  			}
  		}
  	}
  	// Create a function that will receive data sent from the server
  	ajaxRequest.onreadystatechange = function(){
  		if(ajaxRequest.readyState == 4){
  			document.getElementById("output").innerHTML = ajaxRequest.responseText;
  		}
  	}

  	var selection = document.myForm.listYear.value;

  	ajaxRequest.open("GET", "getData.php?selection=" + selection, true);
  	ajaxRequest.send(null);
  }
  function autoDisplay(){
  	var ajaxRequest;  // The variable that makes Ajax possible!

  	try{
  		// Opera 8.0+, Firefox, Safari
  		ajaxRequest = new XMLHttpRequest();
  	} catch (e){
  		// Internet Explorer Browsers
  		try{
  			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
  		} catch (e) {
  			try{
  				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
  			} catch (e){
  				// Something went wrong
  				alert("Your browser broke!");
  				return false;
  			}
  		}
  	}
  	// Create a function that will receive data sent from the server
  	ajaxRequest.onreadystatechange = function(){
  		if(ajaxRequest.readyState == 4){
  			document.getElementById("output").innerHTML = ajaxRequest.responseText;
  		}
  	}

  	var selection = 'all';

  	ajaxRequest.open("GET", "getData.php?selection=" + selection, true);
  	ajaxRequest.send(null);
  }

  //-->
  </script>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <center><h2>Movie Backlog - Implement Sorting</h2></center>
      </div>
      <div class="col-xs-12">
        <form name='myForm'>
        <label for="selectYear">Sort by year released: </label>
        <select name="listYear">
        <option value='all'>All</option>
        <?php

                $config = parse_ini_file('../database.ini');
                $mysql_access = mysql_connect('localhost', $config['username'], $config['password']);
                if (!$mysql_access)
                {
                        echo "Connection failed.";
                        exit;
                }
                mysql_select_db($config['db']);

        	$query = "SELECT DISTINCT releaseYear FROM Movies ORDER BY releaseYear DESC";

        	$result = mysql_query($query);

        	while ($record = mysql_fetch_array($result) ) {

        		echo "<option value='$record[0]'>$record[0]</option>";

        	}

        	mysql_close($mysql_access);

        ?>
        </select>
        <button type="button" class="btn btn-default" onclick="ajaxFunction()">Submit</button>
        </form>
        <br>
      </div>

      <div class="col-xs-12">
        <p id="output"></p>
      </div>

      <div class="col-xs-12" align="center">
        <h3><a href="../assign6/index.php">Return to Backlog Manager</a></h3>
      </div>
    </div>
  </div>
</body>
</html>
