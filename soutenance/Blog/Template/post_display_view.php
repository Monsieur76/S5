<?php
$this->title = 'Article';
?>
<div class="container">
    <?php if (isset($_POST['com']) & $bool === true) { ?>
        <div class="alert alert-success" role="alert">
            Le commentaire a bien été ajouté , attender la validation d'un administrateur.
        </div>
    <?php } elseif (isset($_POST['com']) & $bool === false) { ?>
        <div class="alert alert-danger" role="alert">
            Un champ est vide.
        </div>
    <?php } ?>
    <div class="row">
        <h1 style="text-decoration: underline;margin-top: 30px"> L'article </h1>
    </div>
    <div class="" style="word-wrap: break-word;"><?php
        echo '<br><strong style="font-size:24px">
<div class="jumbotron">
  <h2 class="display-4">' . $post['title'] . '</h2><br></strong><br>
  <p class="lead">' . $post['contained'] . '</p>
  <hr class="my-4"><p><i>Par ' . $post['author'] . 'le ' . $post['date_post'] . '</i></p><br>';
        ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <button type='button' data-target="#addCom<?= $post['id'] ?>" data-toggle="modal"
                    class="btn btnColor btn-dark form-control"><i class="fas fa-comment-alt"> Ajouter commentaire</i>
            </button>
        </div>
        <div class="modal fade" id="addCom<?= $post['id'] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="?route=Validation_de_Commentaire" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau commentaire</h5>
                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" name="name" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Commentaire:</label>
                                <textarea class="form-control" name="com" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="<?= $post['id'] ?>" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" id="confirm" class="btn btn-primary fn_modify_modal">Confirmer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form action="?route=liste_des_Articles" method="post">
            <div class="col-lg-12">
                <button type='submit' class="btn btnColor btn-dark form-control"
                ><i class="fas fa-reply"> Retour a liste des articles</i>
                </button>
            </div>
    </div>
</div>
<div class="text-center" style="margin-top: 50px;margin-bottom: 30px">
    <div class="col-lg-12" style="text-align: left;margin-top: 80px">
        <h2 id="h2">Commentaire</h2>
    </div>
    <div class="row">
        <div class="col-lg-12" id="commentary">
            <?php foreach ($commentary as $donne => $k) { ?>
                <div class="col-lg-12" id="commentarySolo">
                    <strong>De : <?= $k[1] ?></strong><br>
                    Le : <?= $k[2] ?><br>
                    <div style="margin-bottom: 50px;margin-top: 30px;">
                        <?= $k[0] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
