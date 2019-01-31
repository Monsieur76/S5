<?php 

if ($control->is_user_connected()===true){
?><div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
                <ul class="nav nav-tabs">
                    <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="index_view.php">Accueil</a></li></span>
                    <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='display_post_liste_view.php'>Liste des postes</a></li></span>
                    <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="addpost_view.php">Ecrire un article</a></li></span>
                    <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="addpost_user_view.php">Modifier un article</a></li></span>
                    <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='delete_post_view.php'>Supprimé un article</a></li></span>
                    <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='Valid_Admin_view.php'>Demande d'insciption</a></li></span>
                    <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='valid_admin_commentaire_view.php'>Demande de commentaire</a></li></span>
                    <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='connect_resgister_view.php'>Déconnexion</a></li></ul></span>
    </div>
</div>

<?php
        } else {
?><div class="container-fluid">
            <div class="row" style="margin-top: 20px;">
                <ul class="nav nav-tabs ">
                <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="index_view.php">Accueil</a></li></span>
                <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="registration_view.php">Enregistrement</a></li></span>
                <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='display_post_liste_view.php'>Liste des postes</a></li></span>
                <span class="border"><li><a class="nav-link nav-item text-light" style="background-color: #040505" href="addpost_user_view.php">Modifier un article</a></li></span>
                <span class="border"><li> <a class="nav-link nav-item text-light" style="background-color: #040505" href='connect_resgister_view.php'>Connexion</a></li></li></ul></span>
            </div>
    </div>
<?php
        }
?>
