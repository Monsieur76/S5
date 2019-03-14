<?php
$control = new \App\src\Controller\BackController;
if ($control->isUserConnected() === true) {
    ?>
    <div class="container-fluid">
        <div class="nav">
        <ul class="navbar col-lg-12" style="background-color: rgba(255, 255, 255,0.1);text-align: center">
            <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link active"
                                    href="?route=Accueil" >Accueil</a></li>
            <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link"
                                    href='?route=liste_des_Articles' >Liste des Articles</a></li>
            <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link"
                                    href='?route=Administration'>Administration</a></li>
            <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link"
                                    href='?route=Connexion'>Déconnexion</a></li>
        </ul>
        </div>
    </div>
    <?php
} else {
    ?>
<div class="container-fluid">
    <div class="nav">
        <ul class="navbar col-lg-12" style="background-color: rgba(255, 255, 255,0.1);text-align: center">
                    <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link active"
                                                href="?route=Accueil">Accueil</a></li>
                    <li class="nav-item col-lg-3" style="list-style-type: none;"><a id="menu" class="nav-link"
                                                href="?route=Enregistrement">Inscription</a></li>
                    <li class="nav-item col-lg-3" style="list-style-type: none;"> <a id="menu" class="nav-link"
                                                 href="?route=liste_des_Articles">Liste des Articles</a></li>
                    <li class="nav-item col-lg-3" style="list-style-type: none;"> <a id="menu" class="nav-link"
                                                 href='?route=Connexion'>Connexion</a></li>
                </ul>
    </div>
</div>
    <?php
}
?>
