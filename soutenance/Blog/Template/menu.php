<?php
$control = new \App\src\Controller\BackController;
$route = $_GET['route'];
$routeAdmin = ['Administration', 'Validation_de_Suppression', 'Validation_de_commentaire', 'Confirmation_Ajout_Article',
    'confirmation_modification_article', 'Confirmation_Ajout_Utilisateur', 'supprimer_utilisateur', 'Refuser_Commentaire'];
$home = ['liste_des_Articles','Afficher_un_Article','Validation_de_Commentaire'];
if ($control->isUserConnected() === true) {
    ?>
    <div class="container-fluid" style="background-color: rgba(255, 255, 255,0);">
        <div class="nav">
            <ul class="nav nav-pills col-lg-12">
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php if ($route === 'Accueil' ||
                        $route === 'message' || $route === 'connexion_accomplie' ) {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Accueil"><i class="fas fa-home"> Accueil</i></a></li>
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php
                    foreach ($home as $donne) {
                        if ($route === $donne) {
                            echo 'class="nav-link active"';
                        }
                    } ?>
                            href='?route=liste_des_Articles'><i class="fas fa-list-ul"> Liste des articles</i></a></li>
                <li class="nav-item col-lg-3"><a
                            id="menu"
                        <?php
                        foreach ($routeAdmin as $donne) {
                            if ($route === $donne) {
                                echo 'class="nav-link active"';
                            }
                        }
                        ?>
                            href='?route=Administration'><i class="fas fa-toolbox"> Administration</i></a>
                </li>
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php if ($route === 'Connexion') {
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
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php if ($route === 'Accueil' ||
                        $route === 'message' || $route === 'deconnexion' ) {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Accueil"><i class="fas fa-home"> Accueil</i></a></li>
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php
                    foreach ($home as $donne) {
                        if ($route === $donne) {
                            echo 'class="nav-link active"';
                        }
                    } ?>
                            href="?route=liste_des_Articles"><i class="fas fa-list-ul"> Liste des articles</i></a></li>
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php if ($route === 'Enregistrement' ||
                        $route === 'enregistrement_bon') {
                        echo 'class="nav-link active"';
                    } ?>
                            href="?route=Enregistrement"><i class="fas fa-user-plus"> Inscription</i></a>
                </li>
                <li class="nav-item col-lg-3"><a
                            id="menu" <?php if ($route === 'Connexion') {
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