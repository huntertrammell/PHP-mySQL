<?php include "db.php";?>
<?php include "functions.php";?>
<?php createRow(); ?>
<?php include "includes/header.php"?>
    <div class="container">
        <div class="jumbotron">
           <div class="col-6">
               <h1 class="text-center">Create User</h1>
                <form action="login_create.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Create">
                </form>
            </div> 
        </div>
    </div>
<?php include "includes/footer.php"?>