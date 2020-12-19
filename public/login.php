<?php include 'header.php';?>

<body>
    <div class="container pt-5 pb-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="txt_email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="txt_upass">
                    </div>
                    <div class="text-center">
                      <button type="submit" id="btn-signup" class="btn btn-success btn-lg btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php';?>