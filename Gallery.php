<?php // Core Initialization
require_once 'core/init.php';
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>My Gallery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/lightbox.css">

	<script src="js/jquery-3.1.1.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style media="screen">
      .maincontainer {
        margin-top: 70px;
	margin-bottom: 70px;

      }
	body {

background:linear-gradient(#edf7f9, #efe9e6);
}
 </style>

</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ShahGraphs</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>

          <?php $user = new User(); if ($user->isLoggedIn()) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>

              <ul class="dropdown-menu">
                <li><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile <?php echo escape($user->data()->name); ?></a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="changepassword.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>

              </ul>

            </li>
          </ul>
          <?php } // end isLoggedIn
          else { ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
            </ul>
            <?php } // end else  ?>

        </div><!--/.nav-collapse -->

      </div>
    </nav>
<div class="container maincontainer">

<?php 
	$db = mysqli_connect("localhost","root","manager","lr");
	$sql = "SELECT * FROM images";
	$result = mysqli_query($db,$sql);
	echo "<div class='row'>";
	while ($row = mysqli_fetch_array($result)) {

		echo "<div class='col-md-4'> <a href="."'images/".$row['image']."'"." data-lightbox='gallery' class='thumbnail'><img src = 'images/".$row['image']."' ></a></div>";

		/*echo "<div id='img_div'>";
			echo "<img src = 'images/".$row['image']."' >";
			echo "<p>".$row['text']."</p>";
		echo "</div>";*/
	}
	echo "</div>";



?>
</div>
<footer class ="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="text-center" style="padding: 10px">Copyright Reserved by Shahsparx</p>
		</div>
</footer>



	
<script src="js/lightbox.js"></script>
</body>
</html>
