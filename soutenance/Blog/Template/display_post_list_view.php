<?php
$this->title = 'Liste des articles';
?>
<div class="container">
    <div class="row">
        <h1 style="text-decoration: underline;margin-top: 30px">Liste des articles</h1>
    </div>
    <div class="row">
        <?php
        while ($donne = $post->fetch()) { ?>
            <div class="card col-lg-6"
                 style="width: 50rem;height: 40rem;margin-top: 20px;margin-bottom: 20px">
                <div class="card-body">
                    <h3 class="card-title"
                        style="margin-top: 90px;text-decoration: underline"><?= $donne['title'] ?></h3>
                    <h6 class="card-subtitle mb-2 text-muted"
                        style="margin-top: 35px">Publié le <?= $donne['datePost'] ?></h6>
                    <p class="card-btn" style="margin-top: 35px"><?= $donne['chapo'] ?></p>
                    <form action='?route=Afficher_un_Article' method='POST' class="form-group">
                        <ul>
                            <li style="list-style-type: none;">
                                <button type='submit' name='display_poste' class="btnColor btn-dark form-control">
                                    afficher
                                </button>
                            </li>
                            <input type='hidden' name='id'
                                   value="<?= $donne['id']; ?>"/></ul>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
