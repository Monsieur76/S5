<?php
$this->title = 'Accueil'; ?>
<div class="slide container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner active">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../Public/img/photo2.png" alt="First slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../Public/img/photo1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../Public/img/photo3.png" alt="Third slide">
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

<div class="row" style="margin-top: 250px;">
    <div class="imgg col-lg-4" style="margin-bottom: 0px">
        <img src="../Public/img/profile.png" style="width:300px;height:300px;"/>
    </div>
    <div class="col-lg-8" style="font-size: larger;margin-bottom: 150px">
        <h3>Gaetan HENRY<br> Le développeur qu’il vous faut !</h3>
    </div>
    <div class="card col-lg-6" style="width: 10rem;
                            margin-bottom: 0px;margin-top: 155px">
        <div class="card-body contact">
            <h1 class="card-title" style="text-decoration: underline;">Contact</h1>
            <div class="col-lg-12">
                <form action='?route=message' method='POST'>
                    <div class="form-group row col-lg-12">
                        <label for="inputname1" class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-3">
                            <input type="text" name="name" id="inputname1" placeholder='durant'
                                   class="form-control text-center"/>
                        </div>
                        <label for="inputfirstname" class="col-sm-3 col-form-label">
                            Prénom
                        </label>
                        <div class="col-sm-3">
                            <input type="text" name="first_name" id="inputfirstname" placeholder='paul'
                                   class="form-control text-center"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="inputmail">
                            Votre mail
                        </label>
                        <div class="col-lg-9">
                            <input type="text" name="mail" id="inputmail" placeholder='azerty@gmail.com'
                                   class="form-control text-center"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label" for="inputmes">
                            Votre message
                        </label>
                        <div class="col-lg-9">
                <textarea name="message" cols="60px" placeholder='Message' id="inputmes"
                          class="form-control text-center"></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 30px">
                        <button type='submit' name="submit_form"
                                class="btnColor form-control text-center btn-dark">Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-lg-6" style="margin-top: 155px">
    <div class="card-body contact col-lg-12" style="margin-top: 0px;">
    <div class="col-lg-12" style="margin-top: px">
        <h1 class="card-title" style="text-decoration: underline;">Suivez-Moi</h1>
        <ul class="col-lg-12" style="margin-top: 0px; margin-bottom: 0px">
            <div class="col-lg-12" style="display: flex">
                <li id="logo" class="rotate col-lg-6">
                    <a id="logocolor" href="https://github.com/Monsieur76/blog_OC"><i class="fab fa-github-alt fa-5x"></i></a>
                </li>
                <li id="logo" class="rotate col-lg-6"><a id="logocolor" href="#"><i
                                class="fab fa-facebook-square fa-5x"></i></a></li>
            </div>
            <div class="col-lg-12" style="display: flex;margin-top: 0px">
                <li id="logo" class="rotate col-lg-6"><a id="logocolor" href="#"><i
                                class="fab fa-twitter fa-5x"></i></a></li>
                <li  id="logo" class="rotate col-lg-6"><a id="logocolor" href="#"><i
                                class="fab fa-linkedin fa-5x"></i></a></li>
            </div>
        </ul>
    </div>
    </div>
</div>
</div>

