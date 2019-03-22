<?php
$this->title = 'Accueil'; ?>
<div class="slide container-fluid">
    <?php if (isset($_POST['submit_form']) & $bool === true) { ?>
        <div class="alert alert-success" role="alert">
            Le message a bien été envoyé.
        </div>
    <?php } elseif (isset($_POST['submit_form']) & $bool === false) { ?>
        <div class="alert alert-danger" role="alert">
            Un champ est vide où adresse mail non valide.
        </div>
    <?php } elseif (isset($_POST['submit_form']) & $bool === 1) { ?>
        <div class="alert alert-info" role="alert">
            L'e-mail n'a pas pu être envoyé.Vérifier la connexion où les ports.
        </div>
    <?php } elseif (isset($_POST['submit_connect']) & $bool === true) { ?>
        <div class="alert alert-success" role="alert">
            Vous êtes connecté.
        </div>
    <?php } elseif (isset($_POST['deco'])) { ?>
        <div class="alert alert-success" role="alert">
            Vous avez été déconnecté.
        </div>
    <?php } ?>
    <div class="row">
        <h1 style="text-decoration: underline;margin-top: 30px">Accueil</h1>
        <div class="col-lg-12" style="margin-top: 50px">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner active">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../Public/img/back1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../Public/img/back2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../Public/img/back4.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row " style="margin-top: 250px;">
    <div class="imgg col-lg-4" style="margin-bottom: 0px">
        <img src="../Public/img/profile.png" style="width:300px;height:300px;"/>
    </div>
    <div class="col-lg-8" style="font-size: larger;margin-bottom: 150px">
        <h3>Gaetan HENRY<br> Le développeur qu’il vous faut !</h3>
    </div>
    <div class="card col-lg-6" style="
                            margin-bottom: 0px;margin-top: 155px">
        <div class="card-body contact">
            <h1 class="card-title" style="text-decoration: underline;">Contact</h1>
            <div class="col-lg-12">
                <form action='?route=message' method='POST'>
                    <div class="form-group row">
                        <label for="inputname1" class="col-lg-3 col-form-label">Nom</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" id="inputname1" placeholder='durant'
                                   style="text-align: left" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputfirstname" class="col-lg-3 col-form-label">
                            Prénom
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="first_name" id="inputfirstname" placeholder='paul'
                                   style="text-align: left" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="inputmail">
                            Votre mail
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="mail" id="inputmail" placeholder='azerty@gmail.com'
                                   style="text-align: left" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="inputmes">
                            Votre message
                        </label>
                        <div class="col-lg-9">
                <textarea name="message" cols="60px" placeholder='Message' id="inputmes"
                          style="text-align: left" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 30px">
                        <button type='submit' name="submit_form"
                                class="btn btnColor form-control text-center btn-dark"><i class="far fa-envelope">
                                Envoyer</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-lg-6" style="margin-top: 465px">
        <div class="card-body contact col-lg-12" style="margin-top: 0px;">
            <div class="col-lg-12" style="margin-top: 10px">
                <h1 class="card-title" style="text-decoration: underline;">Suivez-Moi</h1>
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="https://github.com/Monsieur76/blog_OC"><i id="logocolor"
                                                                                            class="fab fa-github-alt fa-3x"></i></a>
                    </li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-facebook-square fa-3x"></i></a></li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-twitter fa-3x"></i></a></li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-linkedin fa-3x"></i></a></li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-youtube fa-3x"></i></a></li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-chrome fa-3x"></i></a></li>
                    <li class="nav-item"><a href=""><i id="logocolor" class="fab fa-facebook-messenger fa-3x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

