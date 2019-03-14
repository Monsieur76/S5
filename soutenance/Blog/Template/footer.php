<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class=" col-lg-12">
        <div class="row">
            <div class="col-sm-2">
                    <a  href='?route=Connexion'
                       class="footer" id="link">
                        Déconnexion </a>
            </div>
            <div class="col-sm-2">
                    <a href='?route=Administration'
                       class="footer" id="link">
                        Administration </a>
            </div>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-2">
                    <a href='?route=Connexion'
                       class="footer" id="link">
                        Administration Blog </a>
            </div>
        </div>
    </div>
<?php }
