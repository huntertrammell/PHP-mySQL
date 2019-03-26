<?php include "db.php"; ?>
<?php
function login(){
    if(isset($_POST['submit'])){
        global $connection;
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $user = mysqli_real_escape_string($connection, $user);
        $pass = mysqli_real_escape_string($connection, $pass);

        if($user && $pass){
            echo $user . '<br>' . $pass;
        }else{
            echo "Please enter Username and Password before submitting";
        }

        $connection = mysqli_connect('localhost', 'root', 'root', 'loginapp');
            if(!$connection){
                echo "Database offline";
            }
        
    }
}

function getUserData(){
    global $connection;
    $query = "SELECT * FROM users";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('query failed'. mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

function updateTable(){
    if(isset($_POST['submit'])){
        global $connection;
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $id = $_POST['id'];

        $user = mysqli_real_escape_string($connection, $user);
        $pass = mysqli_real_escape_string($connection, $pass);

        //encrypt password
        $hashFormat = "$2y$10$";
        $salt = "ryfbubxddeobnbubovbddp";
        $hash_and_salt = $hashFormat . $salt;
        $pass = crypt($pass, $hash_and_salt);

        $query = "UPDATE users SET username = '$user', password = '$pass' WHERE id = $id";

        $result = mysqli_query($connection, $query);
        if(!$result){
            die('error updating database' . mysqli_error($connection));
        }else {
            echo "<div class='alert alert-success' role='alert'>record updated</div>";
        }
    }
}

function deleteRow(){
    if(isset($_POST['submit'])){
        global $connection;
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $id = $_POST['id'];

        $user = mysqli_real_escape_string($connection, $user);
        $pass = mysqli_real_escape_string($connection, $pass);

        $query = "DELETE FROM users WHERE id = $id";

        $result = mysqli_query($connection, $query);
        if(!$result){
            die('error updating database' . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success' role='alert'>record deleted</div>";
        }
    }
}

function createRow(){
    if(isset($_POST['submit'])){
        global $connection;
        $user = $_POST['username'];
        $pass = $_POST['password'];
        //prevent SQL injection
        $user = mysqli_real_escape_string($connection, $user);
        $pass = mysqli_real_escape_string($connection, $pass);
        //encrypt password
        $hashFormat = "$2y$10$";
        $salt = "ryfbubxddeobnbubovbddp";
        $hash_and_salt = $hashFormat . $salt;
        $pass = crypt($pass, $hash_and_salt);

        $query = "INSERT INTO users (username, password) VALUES ('$user','$pass')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('query failed'. mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success' role='alert'>record created</div>";
        }
        
    }
}

function readDB(){
            global $connection;
            $query = "SELECT * FROM users";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die('query failed'. mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($result)){
                print_r($row);
            }
}


?>