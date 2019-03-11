<?php
$this->title = 'aficher';
?>
<div class="container">
    <div class="row">
        <h1> L'article </h1>
    </div>
    <div class="" style="word-wrap: break-word;"><?php
        echo '<br><strong style="font-size:24px">' . $post['title'] . '<br></strong>'
            . $post['date_post'] . '<br>' . $post['contained'] . '<br>' . $post['author'] . '<br>';
        ?>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <button type='button' data-target="#addCom<?= $post['id'] ?>" data-toggle="modal"
                    class="btnColor btn-dark form-control">Ajouter commentaire
            </button>
        </div>
        <div class="modal fade" id="addCom<?= $post['id'] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="?route=confirm_commentary" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau commentaire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <button type="submit" id="confirm" class="btn btn-primary fn_modal_addCom">Confirmer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <a type='submit' name='back' href="?route=liste_des_postes" class="btnColor btn-dark form-control"
            >Retour a liste des articles</a>
        </div>
    </div>
    <div class="text-center" style="margin-top: 50px;margin-bottom: 30px">
        <div class="col-lg-12">
            <h2>Commentaire</h2>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;overflow-wrap: break-word">
                <?php foreach ($commentary as $donne => $k) { ?>
                    <strong><?= $k[1] ?></strong><br>
                    <?= $k[2] ?><br>
                    <div style="margin-bottom: 50px"> <?= $k[0] ?><br>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
