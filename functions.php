<?php include "db.php"; ?>
<?php
function login(){
    if(isset($_POST['submit'])){
        global $connection;
        $user = $_POST['username'];
        $pass = $_POST['password'];

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
        $query = "INSERT INTO users (username, password) VALUES ('$user','$pass')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('query failed'. mysqli_error($connection));
        } else {
            echo "<div class='alert alert-success' role='alert'>record created</div>";
        }
        
    }
}

?>