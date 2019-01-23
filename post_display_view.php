<?php 
session_start();
require_once('controller.php');
require_once('postuser.php');
$control=new Controller;
$post = new Manage_Post;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="view.css"  />
        <?php include('header.php');?>
    </head>
    <body>
<?php require('menu.php');?><br><br><br><br><br><br>
<h1> L'article </h1>  <p>          
<?php $post -> display_post() ?>
    </body>
    <footer>
        <?php require('footer.php');?></p>
    </footer>
</html>