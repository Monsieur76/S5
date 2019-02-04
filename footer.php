<?php if ($control->is_user_connected()===true) {
    ?>
    <div class="border-top border-dark">
<div class="row">
    <div class="container-fluid">
<a type="button" href='connect_resgister_view.php' class="btn-dark" style="height: 30px;">
        Déconnexion </a>
        <a type="button" href='delete_post_view.php' class="btn-dark" style="height: 30px;">
            Supprimé un article </a>
        <a type="button" href='Valid_Admin_view.php' class="btn-dark" style="height: 30px;">
            Demande d'insciption </a>
        <a type="button" href='valid_admin_commentaire_view.php' class="btn-dark" style="height: 30px;">
            Demande de commentaire </a>
</div>
    </div>
</div>




<?php
}
    else{
        ?>
<div class="border-top border-dark">
    <div class="row">
        <div class="container-fluid">
            <a type="button" href='connect_resgister_view.php' class="btn-dark" style="height: 30px;">
                Administration Blog </a>
        </div>
    </div>
</div>

  <?php  }
