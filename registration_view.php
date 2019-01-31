<?php session_start();
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

    </head>
    <body>
    <header><?php require('menu.php'); ?></header>
            <?php require('menu.php'); 
            ?>


            <div class="container">
                <div class="row justify-content-center align-items-center" style="margin-top: 20px;">

                        <div class="col-lg-12 text-center">

                        <h1>Enregistrement</h1>
                        </div>
                   <form action='registration_view.php' method='POST'/>
                <div class="col-lg-12"><br>
                </div>
            <div class="form-group col-lg-12 text-center">
                        <input type="text" name="name" placeholder='Nom'
                               style="width: 200px;" class="form-control text-center"/>
            </div>
            <div class="form-group col-lg-12 text-center">
                        <input type="text" name="pass_register" placeholder='password'
                               class="form-control text-center"/>
            </div>
            <div class="form-group col-lg-12 text-center">
                        <input type="text" name="mail" placeholder='Votre Mail'
                               class="form-control text-center"/>
            </div>
                    <div class="row">
            <div class="form-group">
                        <input type='submit' class="btn-dark form-control" style="width: 100px;height: 30px;"
                               name='submit_register' value='Envoyer' />
            </div>
            </div>
                </form>
                </div>
            </div>
            </div>
    </body>
    <footer>
                <?php require('footer.php'); ?>
        </footer>
</html>