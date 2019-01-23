<?php 
session_start();
require_once('controller.php');
$control=new Controller;
?>
<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" type="text/css" href="view.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8" />
        <?php include('header.php');?>
        </head>
    <body>
    <?php require('menu.php'); ?>
        
            <div class="contener1">
            <img src="startbootstrap-freelancer-gh-pages/img/profile.png" />
            <p>Gaetan HENRY<br><br><br><br>Gaetan HENRY, le développeur qu’il vous faut !</p>
            <br><br><br><br><br><br><br><h1>Formulaire de contact</h1>
                <form class="form" action='index_view.php' method='POST'/>
                <input type="text" name="name" placeholder='Nom'/> <br>
                <input type="text" name="first_name" placeholder='Prénom' /><br>
                <input type="text" name="mail" placeholder='Votre Mail' style="width:300px;"/><br>
                <input type="text" name="message" placeholder='Message' style="width:600px;height:200px;"/><br>
                <input type='submit' name='submit_form' value='Envoyer' />
                </form>
         <?php require ('form.php'); ?>

    </body>
    <footer>
    <br><br><br> <?php require('footer.php');?></div>
    </footer>
</html>