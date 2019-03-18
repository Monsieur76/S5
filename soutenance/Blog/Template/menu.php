<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class="container-fluid" style="background-color: rgba(255, 255, 255,0);">
        <div class="nav">
            <ul class="nav nav-pills col-lg-12">
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Accueil') {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Accueil"><i class="fas fa-home"> Accueil</i></a></li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'liste_des_Articles') {
                        echo 'class="nav-link active"';
                    } ?>
                            href='?route=liste_des_Articles'><i class="fas fa-list-ul"> Liste des articles</i></a></li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Administration') {
                        echo 'class="nav-link active"';
                    } ?>
                            href='?route=Administration'><i class="fas fa-toolbox"> Administration</i></a>
                </li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Connexion') {
                        echo 'class="nav-link active"';
                    } ?>
                            href='?route=Connexion'><i class="fas fa-door-open"> Déconnexion</i></a>
                </li>
            </ul>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container-fluid">
        <div class="nav">
            <ul class="nav nav-pills col-lg-12">
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Accueil') {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Accueil"><i class="fas fa-home"> Accueil</i></a></li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'liste_des_Articles') {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=liste_des_Articles"><i class="fas fa-list-ul"> Liste des articles</i></a></li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Enregistrement') {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Enregistrement"><i class="fas fa-user-plus"> Inscription</i></a>
                </li>
                <li class="nav-item col-lg-3" style="list-style-type: none;"><a
                            id="menu" <?php if ($_GET['route'] === 'Connexion') {
                        echo 'class="nav-link active"';
                    } ?>
                            href='?route=Connexion'><i class="fas fa-door-open"> Connexion</i></a>
                </li>
            </ul>
        </div>
    </div>
    <?php
}
?>
