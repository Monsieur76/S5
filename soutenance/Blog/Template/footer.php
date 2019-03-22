<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class=" col-lg-12">
        <div class="row">
            <div class="col-sm-2">
                <a href='?route=Connexion'
                   class="footer" id="link">
                    <i class="fas fa-door-open"> Connexion</i> </a>
            </div>
            <div class="col-sm-2">
                <a href='?route=Administration'
                   class="footer" id="link">
                    <i class="fas fa-toolbox"> Administration</i> </a>
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
                    <i class="fas fa-door-open"> Connexion</i> </a>
            </div>
        </div>
    </div>
<?php }
