<?php
$this->title = 'Enregistrement'; ?>
<div class="container">
    <?php if (isset($_POST['submit_register']) & $bool === true) { ?>
        <div class="alert alert-success" role="alert">
            Votre inscription a été accompli , attendez la confirmation d'un administrateur.
        </div>
    <?php } elseif (isset($_POST['submit_register']) & $bool === false) { ?>
        <div class="alert alert-danger" role="alert">
            Un champ est vide où vous vous êtes trompé.
        </div>
    <?php } elseif (isset($_POST['submit_register']) & $bool === null) { ?>
        <div class="alert alert-warning" role="alert">
            Attention cette e-mail où cette identifiant est déjà utilisé.
        </div>
    <?php } elseif (isset($_POST['submit_register']) & $bool === 0) { ?>
    <div class="alert alert-danger" role="alert">
        Caractère dépassé.
    </div>
    <?php } ?>
    <div class="row">
        <div class="card col-lg-5" style="width: 18rem;align-items: center;
                            margin-bottom: 70px;margin-top: 70px">
            <br>
            <h1 style="text-decoration: underline;">Inscription</h1>
            <div class="card-body">
                <form action="?route=enregistrement_bon" method='POST'>
                    <div class="form-group row">
                        <label for="inputname1" class="col-lg-4 col-form-label">Identifiant</label>
                        <div class="col-lg-8">
                            <input type="text" id="inputname1" name="name" placeholder='cromwell'
                                   class="form-control text-center"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname2" class="col-lg-4 col-form-label">Password</label>
                        <div class="col-lg-8">
                            <input type="password" id="inputname2" name="pass_register"
                                   placeholder='azerty' class="form-control text-center"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname3" class="col-lg-4 col-form-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" name="mail" id="inputname3" placeholder='azerty@hotmail.fr'
                                   class="form-control text-center"/>
                        </div>
                    </div>
                    <button type='submit' class="btn btnColor btn-dark form-control"
                            name='submit_register' style="margin-top: 50px">Envoyer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>