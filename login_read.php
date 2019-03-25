<?php include "db.php";?>
<?php include "functions.php";?>

<?php include "includes/header.php"?>
    <div class="container">
        <div class="jumbotron">
           <div class="col-6">
                    <pre>
                        <?php
                    readDB();
                        ?>
                    </pre>
            </div> 
        </div>
    </div>
<?php include "includes/footer.php"?>