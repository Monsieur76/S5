<?php 
session_start();
require_once('controller.php');
$control=new Controller;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="view.css"  />
        <title>Titre de ma page</title>
        <?php include('header.php');?>
    </head>
    <body>
            <?php require('menu.php'); 
            ?><br><br><br><br><br><br>
                    <h1>Modifier un Article</h1><br><br><br>
<p><?php 
        $control->select_post_and_display();               
?>
                </form>
    </body>
    <footer>
        <?php require('footer.php');?></p>
    </footer>
</html>