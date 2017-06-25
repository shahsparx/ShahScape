<?php // Core Initialization
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>About</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<style type="text/css">
		h3{
			text-align: center;
			padding-right: 300px;
			padding-top: 250px;
			padding-left: 300px;
			color: black;

		}
		p
		{
			text-align: center;
			padding-right: 100px;
			padding-bottom: 150px;
			padding-left: 100px;
			color: black;
		}
		body {

background:linear-gradient(#990909, #efda39);
background-size: auto 100%;
background-position: top center !important;
background-repeat: no-repeat !important;
background-attachment: fixed;
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
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>

          <?php $user = new User(); if ($user->isLoggedIn()) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>

              <ul class="dropdown-menu list-group">
                <li class="list-group-item"><a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile <?php echo escape($user->data()->name); ?></a></li>
                <li class="list-group-item"><a href="update.php">Update</a></li>
                <li class="list-group-item"><a href="changepassword.php">Change Password</a></li>
                <li class="list-group-item"><a href="logout.php">Logout</a></li>

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

<h3>We are tiny little beings living on a tiny little rock</h3>
<p>And we love memories </p>

</body>
</html>