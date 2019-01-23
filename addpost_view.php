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
            ?><br><br><br><br><br><br>
                
                    <h1>Ajouté un Article</h1><br><br>
                    <p><form action='addpost_view.php' method='POST'/>
                        <input type="text" name="title" placeholder='Titre'/> <br>
                        <input type="text" name="author" placeholder='Auteur' /><br>
                        <input type="text" name="chapo" placeholder='Châpo' style="width:300px;"/><br>
                        <input type="text" name="contained" placeholder='Contenue' style="width:600px;height:200px;"/><br>
                        <input type='submit' name='add_post' value='Envoyer' />
                        <?php 
                       
                        ?>
                </form>
    </body>
    <footer>
        <?php require('footer.php');?></p>
    </footer>
</html>