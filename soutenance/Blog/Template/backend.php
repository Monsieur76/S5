<?php
$this->title = 'Administration';
?>
<div class="container" style="margin-bottom: 50px">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne"
                            style="text-decoration: underline;font-size: large;color: #9c743f">
                        Modification/Suppression d'un Article
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse <?php if (isset($_POST['update']) || isset($_POST['delete'])) {
                echo 'show';
            } ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php if (isset($_POST['update']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            La modification a bien été enregistrée.
                        </div>
                    <?php } elseif (isset($_POST['update']) & $bool === false) { ?>
                        <div class="alert alert-danger" role="alert">
                            Un champ est vide.
                        </div>
                    <?php } elseif (isset($_POST['update']) & $bool === null) { ?>
                    <div class="alert alert-danger" role="alert">
                        Caratère dépassé.
                    </div>
                    <?php } elseif (isset($_POST['delete']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            L'article a bien été supprimé
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table-sm text-light col-lg-12" style="background-color: #9c743f">
                            <thead>
                            <tr>
                                <th scope="col" class="scop">Titre</th>
                                <th scope="col" class="scop">Chapo</th>
                                <th scope="col" class="scop">Date de l'article</th>
                                <th scope="col" class="scop" style="font-size: x-large">Modification/Suppression</th>
                            </tr>
                          </thead>
                            <tbody>
                            <?php foreach ($data as $donne => $key) { ?>
                                <tr>
                                    <th scope="row" class="th"><?= $key[1] ?></th>
                                    <td class="th"><?= $key[2] ?></td>
                                    <td class="th"><?= $key[5]; ?></td>
                                    <td style="border-top:double">
                                        <button type="button" class="btn col-lg-3" data-toggle="modal"
                                                data-target="#update<?= $key[0] ?>">
                                            <i id="updateColor" class="fas fa-pencil-alt fa-2x"></i>
                                        </button>
                                        <button type="button" id="inputDelete" data-toggle="modal" class="btn col-lg-3"
                                                data-target="#delete<?= $key[0] ?>"><i class="far fa-trash-alt
                                                fa-2x" id="refusalCircle"></i>
                                        </button>
                                        <div class="modal fade" id="update<?= $key[0] ?>" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal1" style="color: black">
                                                            Modification</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="?route=confirmation_modification_article"
                                                          method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Titre</label>
                                                                <textarea class="form-control" name="title" rows="3"
                                                                          style="text-align: left"
                                                                          id="recipient-name"><?= $key[1] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Chapo</label>
                                                                <textarea class="form-control" rows="5" name="chapo"
                                                                          style="text-align: left"
                                                                          id="recipient-name"><?= $key[2] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Autheur</label>
                                                                <input type="text" class="form-control"
                                                                       id="recipient-name" style="text-align: left"
                                                                       name="author" value="<?= $key[4] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" style="color: black"
                                                                       class="col-form-label">Contenu de
                                                                    l'article</label>
                                                                <textarea class="form-control" rows="10"
                                                                          name="contained" style="text-align: left"
                                                                          id="message-text"><?= $key[3] ?></textarea>
                                                                <input type="hidden" name="id_post"
                                                                       value="<?= $key[0] ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" name="update"
                                                                    class="btn btn-primary fn_modify_modal"
                                                                    data-target="#confirm" data-toggle="modal"> Modifier
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="delete<?= $key[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: black">Suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir supprimer l'article et tout les
                                                        commentaires associer ?
                                                    </div>
                                                    <form action="?route=Validation_de_Suppression" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $key[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" name="delete" class="btn btn-primary">
                                                                Supprimer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                            style="text-decoration: underline;font-size: large;color: #9c743f">
                        Ecrire un article
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse <?php if (isset($_POST['registerPost'])) {
                echo 'show';
            } ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <?php if (isset($_POST['registerPost']) & $bool === true) { ?>
                    <div class="alert alert-success" role="alert">
                        L'article a bien été enregistrée.
                    </div>
                <?php } elseif (isset($_POST['registerPost']) & $bool === false) { ?>
                    <div class="alert alert-danger" role="alert">
                        Un champ est vide.
                    </div>
                <?php } elseif (isset($_POST['registerPost']) & $bool === null) { ?>
                    <div class="alert alert-danger" role="alert">
                        Caratère dépassé.
                    </div>
                <?php } ?>
                <div class="card-body">
                    <form action="?route=Confirmation_Ajout_Article" method="post">
                        <div class="form-row" style="background-color: #9c743f">
                            <div class="form-group col-lg-6 colorInputSave" style="margin-top: 10px">
                                <label for="inputname4" style="color: antiquewhite"><strong>Titre</strong></label>
                                <div class="">
                                    <input id="inputname4 colorInputSave" type="text" name="title" placeholder='Terminus'
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-lg-6 colorInputSave" style="margin-top: 10px;">
                                <label for="inputname1" style="color: antiquewhite"><strong>Autheur</strong></label>
                                <div class="">
                                    <input type="text" id="inputname1 colorInputSave" name="author" placeholder='Alix Lerman Enriquez'
                                           class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row col-lg-12 colorInputSave" style="margin-top: 10px;">
                                <label for="inputname2" class="col-lg-12 col-form-label"
                                       style="color: antiquewhite"><strong>Chapo</strong></label>
                                <div class="col-lg-12">
                                <textarea id="inputname2 colorInputSave" rows="3" name="chapo"
                                          placeholder='J’ai pris un train en sens inverse.'
                                          class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-12 colorInputSave" style="margin-top: 10px;">
                                <label for="inputname3" class="col-lg-12 col-form-label"
                                       style="color: antiquewhite"><strong>Contenu</strong></label>
                                <div class="col-lg-12">
                        <textarea name="contained" rows="10" id="inputname3" class="form-control colorInputSave"
                                  placeholder="J’ai pris un train en sens inverse."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" id="#inputwrite" data-toggle="modal"
                                        data-target="#exampleModal1" class="btn" style="color: antiquewhite"><i
                                            id="updateColor" class="far fa-save fa-3x"></i>
                                </button>
                            </div>
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Ete vous sur de vouloir l'enregistrer ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Fermer
                                            </button>
                                            <button type="submit" name="registerPost" class="btn btn-primary">
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading4">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4"
                            aria-expanded="false" aria-controls="collapse4"
                            style="text-decoration: underline;font-size: large;color: #9c743f">
                        Demande de commentaire
                    </button>
                </h2>
            </div>
            <div id="collapse4" class="collapse <?php if (isset($_POST['valid']) || isset($_POST['refusal'])) {
                echo 'show';
            } ?>" aria-labelledby="heading4" data-parent="#accordionExample">
                <div class="card-body">
                    <?php if (isset($_POST['valid']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            Le commentaire a bien été ajouté.
                        </div>
                    <?php } elseif (isset($_POST['refusal']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            Le commentaire a bien été supprimé.
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table-sm text-light col-lg-12" style="background-color: #9c743f">
                            <thead>
                            <tr>
                                <th scope="col" class="scop">Nom</th>
                                <th scope="col" class="scop">Commentaire</th>
                                <th scope="col" class="scop">Article</th>
                                <th scope="col" class="scop">Date</th>
                                <th scope="col" class="scop" style="border-bottom: double">Ajouter commentaire</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataAdminCommentary as $commentary => $k) { ?>
                                <tr>
                                    <th scope="row" class="th"><?= $k[5] ?></th>
                                    <th class="th">
                                        <button type="button" class="btn btn-primary" style="width: 180px"
                                                data-toggle="modal" data-target="#read<?= $k[1] ?>">Lire le commentaire
                                        </button>

                                        <div class="modal fade" id="read<?= $k[1] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="read<?= $k[1] ?>Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: black">Commentaire</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        <?= $k[1] ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fermer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th style="border-top:double;border-right:double"><?= $k[3] ?></th>
                                    <th style="border-top:double;border-right:double"><?= $k[4] ?></th>
                                    <th style="border-bottom: double">
                                        <button type="button" id="inputValidCom" data-toggle="modal"
                                                class="btn col-lg-3"
                                                data-target="#validCom<?= $k[0] ?>"><i id="validCircle"
                                                                                       class="far fa-check-circle fa-2x"></i>
                                        </button>
                                        <button type="button" id="inputRefusalCom" data-toggle="modal"
                                                class="btn col-lg-3"
                                                data-target="#refusalCom<?= $k[0] ?>"><i id="refusalCircle"
                                                                                         class="far fa-times-circle fa-2x"></i>
                                        </button>
                                        <div class="modal fade" id="validCom<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="validCommentary" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="validCommentary"
                                                            style="color: black">
                                                            Validation commentaire</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir Valider le Commentaire?
                                                    </div>
                                                    <form action="?route=Validation_de_commentaire" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" id="validCom" name="valid"
                                                                    class="btn btn-primary">
                                                                Valider
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="refusalCom<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="refusalCommentary" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="refusalCommentary"
                                                            style="color: black">
                                                            Suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir Supprimer le Commentaire ?
                                                    </div>
                                                    <form action="?route=Refuser_Commentaire" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" name="refusal"
                                                                    class="btn btn-primary">Supprimer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="heading5">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5"
                            aria-expanded="false" aria-controls="collapse5"
                            style="text-decoration: underline;font-size: large;color: #9c743f">
                        Demande d'inscription
                    </button>
                </h2>
            </div>
            <div id="collapse5" class="collapse <?php if (isset($_POST['addUser']) || isset($_POST['deleteUser'])) {
                echo 'show';
            } ?>" aria-labelledby="heading5" data-parent="#accordionExample">
                <div class="card-body">
                    <?php if (isset($_POST['addUser']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            L'utilisateur a bien été enregistrée.
                        </div>
                    <?php } elseif (isset($_POST['deleteUser']) & $bool === true) { ?>
                        <div class="alert alert-success" role="alert">
                            L'utilisateur a bien été supprimé.
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table-sm text-light col-lg-12" style="background-color: #9c743f;">
                            <thead>
                            <tr>
                                <th scope="col" style="border-right: double;font-size: x-large">Pseudo</th>
                                <th scope="col" style="border-right: double;font-size: x-large">Mail</th>
                                <th scope="col" style="border-right: double;font-size: x-large">Date d'inscription</th>
                                <th scope="col" style="border-bottom: double;font-size: x-large">Ajouter Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataAdminUser as $donne => $k) { ?>
                                <tr>
                                    <th scope="row" style="border-top:double;border-right:double"><?= $k[1] ?></th>
                                    <th style="border-top:double;border-right:double"><?= $k[3] ?></th>
                                    <th style="border-top:double;border-right:double"><?= $k[4] ?></th>
                                    <th style="border-bottom: double">
                                        <button type="button" id="inputValidUser" data-toggle="modal" class="btn"
                                                data-target="#validUser<?= $k[0] ?>"><i id="validCircle"
                                                    class="far fa-check-circle fa-2x"></i>
                                        </button>
                                        <button type="button" id="inputRefusalUser" data-toggle="modal" class="btn"
                                                data-target="#refusalUser<?= $k[0] ?>">
                                            <i id="refusalCircle" class="far fa-times-circle fa-2x"></i>
                                        </button>
                                        <div class="modal fade" id="validUser<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: black">
                                                            Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir passer l'utilisateur en Administrateur ?
                                                    </div>
                                                    <form action="?route=Confirmation_Ajout_Utilisateur" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" id="validUser" name="addUser"
                                                                    class="btn btn-primary ">
                                                                Valider
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="refusalUser<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: black">
                                                            Suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir supprimer l'utilisateur ?
                                                    </div>
                                                    <form action="?route=supprimer_utilisateur" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" name="deleteUser"
                                                                    class="btn btn-primary">Supprimer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

