<?php 

if ($control->is_user_connected()===true){
?>
                <ul class="navbar-nav" >
                <li><a href="index_view.php">Accueil</a></li>
                <li> <a href='display_post_liste_view.php'>Liste des postes</a></li>
                <li><a href="addpost_view.php">Ecrire un article</a></li>
                <li><a href="addpost_user_view.php">Modifier un article</a></li>
                <li> <a href='delete_post_view.php'>Supprimé un article</a></li>
                <li> <a href='Valid_Admin_view.php'>Demande d'insciption</a></li>
                <li> <a href='valid_admin_commentaire_view.php'>Demande de commentaire</a></li>
                <li> <a href='connect_resgister_view.php'>Déconnexion</a></li></ul></ul>

<?php
        } else {
?> <ul class="navbar1">
<ul class="navbar-nav" >
                <li><a href="index_view.php">Accueil</a></li>
                <li><a href="registration_view.php">Enregistrement</a></li>
                <li> <a href='display_post_liste_view.php'>Liste des postes</a></li>
                <li><a href="addpost_user_view.php">Modifier un article</a></li>
                <li> <a href='connect_resgister_view.php'>Connexion</a></li></li></ul></ul>
<?php
        }
?>
