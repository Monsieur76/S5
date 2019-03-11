<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class="border-top border-dark  col-lg-12">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <a type="button" href='?route=Connexion'
                       class="btnColor btn-dark form-control">
                        Déconnexion </a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <a type="button" href='?route=Administration'
                       class="btnColor btn-dark form-control">
                        Administration </a>
                </div>
            </div>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="border-top border-dark col-lg-12">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-groupe">
                    <a type="button" href='?route=Connexion'
                       class="btnColor btn-dark form-control">
                        Administration Blog </a>
                </div>
            </div>
        </div>
    </div>
<?php }
