<?php include "functions.php" ?>
<?php login(); ?>
<?php include "includes/header.php"?>
    <div class="container">
        <div class="jumbotron">
           <div class="col-6">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Login">
                </form>
            </div> 
        </div>
    </div>
<?php include "includes/footer.php"?>