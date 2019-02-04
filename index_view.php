<?php
session_start();
require_once('controller.php');
$control = new Controller;
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
    <meta charset="utf-8"/>
    <?php include('header.php'); ?>
</head>
    <header><?php require('menu.php'); ?></header>
<div class="container">
<div class="row">
    <div class="imgg col-4"/>
    <img src="startbootstrap-freelancer-gh-pages/img/profile.png" style="width:200px;height:200px" />
</div>
    <div class="col-8">
    <h3>Gaetan HENRY<br> Le développeur qu’il vous faut !</h3>
    </div>
</div>
    <div class="row">
    <h1>Formulaire de contact</h1>
</div>
<div class="row">
<form action='index_view.php' method='POST' >
    <div class="form-group">
        <label> Nom
        <input type="text" name="name" placeholder='durant' class="form-control text-center"/></label>
    </div>
<div class="form-group">
    <label>Prénom
    <input type="text" name="first_name" placeholder='paul' class="form-control text-center"/></label>
</div>
<div class="form-group">
    <label>Votre mail
    <input type="text" name="mail" placeholder='Votre Mail' class="form-control text-center"/></label>
</div>
<div class="form-group">
    <label>Votre message
    <textarea name="message" placeholder='Message' class="form-control text-center">
    </textarea></label>
</div>
    <div class="form-group">
    <input type='submit' class="btn-dark" name='submit_form' value='Envoyer' class="form-control text-center" />
    </div>
</div>
    </div>
</div>
</form>
        <div class="row">
    <a href='https://github.com/Monsieur76/moi_exercice.git'><img src='github.png' style="width:250px;height:100px"/></a>
            <img src='tout_logo.png' style="width:250px;height:100px"/>
</div>
</div>
<?php require('form.php'); ?>
</div>
</body>
<footer>
 <?php require('footer.php'); ?>
</footer>
</html>
