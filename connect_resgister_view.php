
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
        <?php include('header.php');?>
    </head>
    <body>
            <?php require('menu.php'); 

if ($control->is_user_connected())
    {
?>
        Déconnexion 
        <form action='index_view.php' method='POST'/>
        <input type='submit' name='deconnec' value='Déconnexion' />
        <input type='hidden' name='deco'   value='Déconnexion' /></form><?php
    }
else
    {
?>
        <form method='POST'/>
        <h1>Connexion</h1>
        <input type="text" name="name_connect" placeholder='Nom'/> <br>
        <input type="password" name="password_connect" placeholder='Mot de pass' /><br>
        <input type='submit' name='submit_connect' value='Envoyer' />
        </form>
        <?php 
    }
?>
    </body>
    <footer>
        <?php require('footer.php');?>
    </footer>
</html>