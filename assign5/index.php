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
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <form method="post">
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default" method="get">Submit</button>
        </form>
      </div>
      <?php
        $myfile = fopen("login.txt", "r") or die("Unable to open file!");

        $submittedEmail = $_POST['email'];
        $submittedPassword = $_POST['pass'];
        $userLogin = $submittedEmail . " " . $submittedPassword;
        //echo $userLogin;
        $myLogin = fread($myfile,filesize("login.txt"));
        //echo $myLogin;
        $myLogin = str_replace("\n", "", $myLogin);
        //echo $myLogin;
        $userLogin = str_replace("\n", "", $userLogin);
        if($userLogin === $myLogin) {
          //echo "Login successful.";
          $userName = substr($submittedEmail, 0, strpos($submittedEmail, '@'));
          $fn = $userName . ".dat";
          /*
          $fp = fopen($fn, "w");
          fwrite($fp, "$userName");
          */
          $_SESSION["currentUser"] = $userName;
          $_SESSION["userDataFile"] = $fn;
          header("Location: admin.php");
        }
        else {
          echo "Invalid credentials";
        }
        fclose($myfile);
        fclose($fp);
      ?>
    </div>
  </div>

</body>

</html>
