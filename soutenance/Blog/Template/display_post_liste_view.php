<?php
$this->title ='display_post_liste';
 ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
<h1> Liste des articles </h1>
            </div>
            </div>
        <div class="row col-lg-12">
    <?php
    while ($donne = $post -> fetch()) {?>
                    <div class="card col-lg-4"
                         style="width: 25rem;height: 35rem;margin-bottom: 20px;">
                        <div class="card-body">
                    <h5 class="card-title"><?=$donne['title']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"
                    style="margin-top: 35px"><?=$donne['datePost']?></h6>
                <p class="card-text" style="margin-top: 35px"><?=$donne['chapo']?></p>
                    <form action = '?route=afficher_Post' method = 'POST' class="form-group">
                        <input type = 'submit' name = 'display_poste' value = 'afficher'
                               class="btnColor btn-dark form-control"/>
                        <input type = 'hidden' name = 'id_post_select_display'
                               value = "<?=$donne['id'];?>" />
                    </form>
                    </div>
                    </div>
<?php } ?>
        </div>
    </div>
