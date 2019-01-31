<?php 
session_start();
require_once('controller.php');
$control=new Controller;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="view.css"/>
        <?php include('header.php');?>
    </head>
    <body>
    <header><?php require('menu.php'); ?></header>
    <div class="container-fluid">
    <div class="row">
                    <h1>Ajouter un Article</h1>
    </div>
        <div class="row">
                    <form action='addpost_view.php' method='POST' />
        <div class="form-group">
                        <input type="text" name="title" placeholder='Titre' class="form-control text-center"/>
        </div>
            <div class="form-group">
                <input type="text" name="author" placeholder='Auteur' class="form-control text-center"/>
            </div>
                <div class="form-group">
                        <input type="text" name="chapo" placeholder='Châpo'  class="form-control text-center"/>
                </div>
                    <div class="form-group">
                        <textarea name="contained" placeholder='Contenue' class="form-control text-center">
                        </textarea>
                    </div>
                        <div class="form-group">
                        <input type='submit' name='add_post' class="btn-dark" value='Envoyer'
                               style="width: 100px;height: 30px;" class="form-control text-center"/>
                        </div>
        </form>
    </div>
    </div>
    </body>
    <footer>
        <?php require('footer.php');?></p>
    </footer>
</html>