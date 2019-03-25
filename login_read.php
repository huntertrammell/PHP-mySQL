<?php 
 $connection = mysqli_connect('localhost', 'root', 'root', 'loginapp');
            if($connection){
                echo "Database online";
            } else {
                die("Database connection failed");
            }
            $query = "SELECT * FROM users";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die('query failed'. mysqli_error());
            } else {
                echo "query success";
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
           <div class="col-6">
                <?php 
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <pre>
                        <?php
                        print_r($row);
                        ?>
                        </pre>
                        <?php
                    }
                ?>
            </div> 
        </div>
    </div>
</body>
</html>