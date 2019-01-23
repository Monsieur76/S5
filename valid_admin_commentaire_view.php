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
                    <h1>Liste des nouveaux commentaire</h1><br><br>
                    <form action='Valid_Admin_commentaire_view.php' method='POST'/><p>
<?php
$control->new_commentary();
?>     
    </body>
    <footer>
        <?php require('footer.php'); ?></p>
        </footer>
</html>