<?php // Core Initialization
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShahGraphs</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <style media="screen">
      .maincontainer {
        margin-top: 70px;

      }
	
body {
background-image: url(img/header.jpg); /*You will specify your image path here.*/

-moz-background-size: cover;
-webkit-background-size: cover;
background-size: cover;
background-position: top center !important;
background-repeat: no-repeat !important;
background-attachment: fixed;
}
#alert{
  font-size: 30px;
}

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <div class="container">
    <div class="row">


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

<?php






/*Teste de Configuração video "06. Config Class"
echo Config::get('mysql/host'); // 'localhost'
var_dump(Config::get('mysql/host/index'));


DB::getInstance();

$user = DB::getInstance()->query("SELECT username FROM users\ WHERE username =?", array('alex'));
if ($user->error()) {
  echo "No user";
} else {
  echo "Ok!";
}

$user = DB::getInstance()->get('users', array('username', '=', 'alex'));

if (!$user->count()) {
  echo "No user";
} else {
  echo "Ok!";
}

$user = DB::getInstance()->query("SELECT * FROM users");

$user = DB::getInstance()->get('users', array('username', '=', 'alex'));


if (!$user->count()) {
  echo "No user";
} else {
  foreach ($user->results() as $user) {
    echo $user->username, '<br>';
  }
  echo $user->results()[0]->username;
  echo $user->first()->username;
}

$user = DB::getInstance()->insert('users', array(
  'username'  => 'Dale',
  'password'  => 'password',
  'salt'      => 'salt'
));

$userUpdate = DB::getInstance()->update('users', 13, array(
  'username' => 'TesteUpdate',
  'password'  => 'newpassword',
  'name' => 'Emanuel Limeira'
));

if (Session::exists('success')) {
  echo Session::flash('success');
}
*/


echo "<div class='maincontainer'>";

if (Session::exists('home')) {
  echo '<p>' . Session::flash('home') .  '</p>';
}

//print Session::get(Config::get('session/session_name'));

$user = new User();
//echo $user->data()->username;
if ($user->isLoggedIn()) {

  echo "<p class='label label-success'>Success! You are logged in!</p><br><br>";
  ?>
  <p>
    Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->name); ?></a>
  </p>

  <ul class="list-group">
    <li class="list-group-item"><a href="update.php">Update</a></li>
    <li class="list-group-item"><a href="changepassword.php">Change Password</a></li>
    <li class="list-group-item"><a href="logout.php">Logout</a></li>
    <li class="list-group-item"><a href="Gallery.php">Your Gallery</a></li>
    <li class="list-group-item"><a href="upload.php">Upload Photos</a></li>

  </ul>
  <?php
  // User Permission
  if ($user->hasPermission('admin')) {
    echo "<p>You are an Administrator!</p>";
  }
} else {
  echo "<p id='alert'>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
}

echo "</div> <!-- //maincontainer -->";

include 'includes/footer.php';
