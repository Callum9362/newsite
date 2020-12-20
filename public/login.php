<?php

include 'header.php';

if ($user->is_loggedin() != "") {
    $user->redirect('index.php');
}

if (isset($_POST['btn-login'])) {
    $uname = $_POST['txt_uname_email'];
    $umail = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];

    if ($user->login($uname, $umail, $upass)) {
        $user->redirect('index.php?loggedIn');
    } else {
        $error = "Wrong Details !";
    }
}
?>

<body>
    <div class="container pt-5 pb-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="card-body">
                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                    </div>
                <?php
                }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="txt_uname_email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="txt_password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btn-login" class="btn btn-success btn-lg btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>