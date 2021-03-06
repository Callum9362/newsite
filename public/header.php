<?php
require_once '../database/Dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="<%= BASE_URL %>favicon.ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">
  <!-- Custom CSS Always has to be after BS due to cascading-->
  <title>Newsite</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">NewsSite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsroom.php">News Room</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsfeed.php">News Feeds</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="distro.php">Distribution Channels</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <?php if (!isset($_SESSION['user_session'])) {
        echo '<li class="nav-item">
               <a class="nav-link" href="join.php">Join Now</a>
              </li>';
        echo '<li class="nav-item">
               <a class="nav-link" href="login.php">Login</a>
              </li>';
      } else {
        echo '
        <form action="../includes/logout.php" method="post">
            <button class="btn btn-submit" type="submit" name="logout-submit">Logout</button>
        </form>';
        
      } ?>
    </ul>
  </div>
</nav>