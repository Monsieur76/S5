<?php session_start();
require_once('controller.php');
$control=new Controller;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="view.css"  />
        <?php include('header.php');?>
    </head>
    <body>
            <?php require('menu.php'); 
            ?><br><br><br><br><br><br>
                    <h1>Liste des nouveaux inscrit</h1><br><br>
                    <form action='Valid_Admin_view.php' method='POST'/><p>
<?php
$control->new_user_admin_wait_valid();
?>       
    </body>
    <footer>
        <?php require('footer.php'); ?></p>
        </footer>
</html>