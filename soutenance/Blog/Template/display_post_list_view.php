<?php
$this->title = 'Liste des articles';
?>
<div class="container">
    <div class="row"">
        <?php
        while ($donne = $post->fetch()) { ?>
            <div class="card col-lg-6"
                 style="width: 50rem;height: 40rem;">
                <div class="card-body">
                    <h5 class="card-title" style="margin-top: 90px;text-decoration: underline"><?= $donne['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"
                        style="margin-top: 35px">Publié le <?= $donne['datePost'] ?></h6>
                    <p class="card-btn" style="margin-top: 35px"><?= $donne['chapo'] ?></p>
                    <form action='?route=Afficher_un_Article' method='POST' class="form-group">
                        <ul>
                        <li style="list-style-type: none;"><input type='submit' name='display_poste' value='afficher'
                               class="btnColor btn-dark form-control"/></li>
                        <input type='hidden' name='id_post_select_display'
                               value="<?= $donne['id']; ?>"/></ul>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
