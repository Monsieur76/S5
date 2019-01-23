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
                
                    <h1>Enregistrement</h1><br><br><br>
                   <p> <form action='registration_view.php' method='POST'/>
                        <input type="text" name="name" placeholder='Nom'/> <br>
                        <input type="text" name="pass_register" placeholder='password' /><br>
                        <input type="text" name="mail" placeholder='Votre Mail' style="width:300px;"/><br>
                        <input type='submit' name='submit_register' value='Envoyer' />
                </form>
    </body>
    <footer>
        <?php require('footer.php'); ?></p>
        </footer>
</html>