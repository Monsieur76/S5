<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class="container-fluid">
        <div class="menu1" >
            <div class="row" style="margin-top: 20px;">
                <ul class="nav nav-tabs">
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href="?route=Accueil">Accueil</a></li></span>
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href='?route=liste_des_postes'>Liste des Articles</a></li></span>
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href='?route=Administration'>Administration</a></li></span>
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href='?route=Connexion'>Déconnexion</a></li></ul>
                </span>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container-fluid">
        <div class="menu2">
            <div class="row" style="margin-top: 20px;">
                <ul class="nav nav-tabs ">
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href="?route=Accueil">Accueil</a></li></span>
                    <span class="border"><li><a class="btnColor btn-dark nav-link nav-item text-light"
                                                href="?route=enregistrement">Inscription</a></li></span>
                    <span class="border"><li> <a class="btnColor btn-dark nav-link nav-item text-light"
                                                 href="?route=liste_des_postes">Liste des Articles</a></li></span>
                    <span class="border"><li> <a class="btnColor btn-dark nav-link nav-item text-light"
                                                 href='?route=Connexion'>Connexion</a></li></ul>
                </span>
            </div>
        </div>
    </div>
    <?php
}
?>
