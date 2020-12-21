<?php


if(isset($POST['logout-submit'])){
    session_destroy();
    unset($_SESSION['user_session']);
    $user->redirect('index.php?out');
  }


?>