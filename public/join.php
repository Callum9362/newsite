<?php 

include 'header.php'; 



if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
   if($uname=="") {
      $error[] = "provide username !"; 
   }
   else if($umail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['user_email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($uname,$umail,$upass)) 
            {
                $user->redirect('join.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>


<body>
    <div class="container pt-5 pb-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Sign Up Today</h1>
            </div>
            <div class="card-body">
                <form method="post">
                <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                ?>
                <div class="alert alert-info">
                     <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
                </div>
                <?php
           }
           ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="txt_uname" value="<?php if(isset($error)){echo $uname;}?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="txt_umail" aria-describedby="emailHelp" value="<?php if(isset($error)){echo $umail;}?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="txt_upass">
                    </div>
                    <div class="text-center">
                     <button type="submit" name="btn-signup" class="btn btn-primary btn-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>