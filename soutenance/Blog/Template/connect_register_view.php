<?php
$this->title = 'Connexion/Déconnexion';
$control = new \App\src\Controller\BackController();
if ($control->isUserConnected()) {
    ?>
    <div class="container">
        <div class="row">
            <h1>Déconnexion </h1>
        </div>
        <div class="row">
            <form action='?route=deconnexion' method='POST'>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type='submit' name='deconnec' value='Déconnexion'
                               class="btnColor text-light form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <input type='hidden' name='deco' value='Déconnexion'/>
            </form>
        </div>
    </div>
    </div><?php
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="card col-lg-5" style="width: 18rem;align-items: center;
                            margin-bottom: 70px;margin-top: 70px">
                <img src="../Public/img/poigner.jpg" class="card-img-top" style="margin-top: 15px">
                <div class="card-body">
                    <h5 class="card-title">Connexion</h5>
                    <form action='?route=connexion_accomplie' method='POST'>
                        <div class="form-group row">
                            <label for="inputname1" class="col-sm-4 col-form-label">Identifiant</label>
                            <div class="col-sm-8">
                                <input type="text" id="inputname1" name="name_connect" placeholder='cromwell'
                                       class="form-control text-center"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputname2" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" id="inputname2" name="password_connect"
                                       placeholder='azerty' class="form-control text-center"/>
                            </div>
                        </div>
                        <input type='submit' class="btnColor text-light form-control" style="margin-top: 30px;"
                               name='submit_connect' value='Envoyer'/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
