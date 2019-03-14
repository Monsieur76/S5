<?php
$this->title = 'Administration';
?>
<div class="container" style="margin-bottom: 50px">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                        Modification/Suppression d'un Article
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm text-light">
                            <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Chapo</th>
                                <th scope="col">Date de l'article</th>
                                <th scope="col">Modification/Suppression</th>
                            </tr>
                            </thead>
                            <?php foreach ($data as $donne => $k) { ?>
                                <tbody>
                                <tr>
                                    <th scope="row"><?= $k[1] ?></th>
                                    <td><?= $k[2] ?></td>
                                    <td><?= $k[5]; ?></td>
                                    <td>
                                        <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModal<?= $k[0] ?>"
                                                data-whatever="@mdo"><i
                                                    class="rotate fas fa-pen-square fa-2x text-light"></i></button>
                                        <button type="button" id="inputDelete" data-toggle="modal"
                                                data-target="#delete<?= $k[0] ?>"><i
                                                    class="rotate far fa-times-circle fa-1x"></i>
                                        </button>
                                        <div class="modal fade" id="exampleModal<?= $k[0] ?>" tabindex="-1"
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
                                                    <form action="?route=confirmation_modification_article" method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Title</label>
                                                                <textarea class="form-control" name="title"
                                                                          id="recipient-name"><?= $k[1] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Chapo</label>
                                                                <textarea class="form-control" name="chapo"
                                                                          id="recipient-name"><?= $k[2] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" style="color: black"
                                                                       class="col-form-label">Author</label>
                                                                <input type="text" class="form-control"
                                                                       id="recipient-name"
                                                                       name="author" value="<?= $k[4] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" style="color: black"
                                                                       class="col-form-label">Contenu de
                                                                    l'article</label>
                                                                <textarea class="form-control" name="contained"
                                                                          id="message-text"><?= $k[3] ?></textarea>
                                                                <input type="hidden" name="id_post"
                                                                       value="<?= $k[0] ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary fn_modify_modal"
                                                                    data-target="#confirm" data-toggle="modal"> Modifier
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="delete<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black">Suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black">
                                                        Ete vous sur de vouloir supprimer ?
                                                    </div>
                                                    <form action="?route=Validation_de_Suppression" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Ecrire un article
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="?route=Confirmation_Ajout_Article" method="post">
                        <div class="form-row">
                            <div class="form-group col-lg-6" style="margin-top: 10px;text-align: left">
                                <label for="inputname4"><strong>Titre</strong></label>
                                <div class="">
                                <input id="inputname4" type="text" name="title" placeholder='Terminus'
                                          class="form-control text-center" >
                                </div>
                            </div>
                            <div class="form-group col-lg-6" style="margin-top: 10px;text-align: left">
                                <label for="inputname1"><strong>Autheur</strong></label>
                                <div class="">
                                    <input type="text" id="inputname1" name="author" placeholder='Alix Lerman Enriquez'
                                           class="form-control text-center"/>
                                </div>
                            </div>
                            <div class="form-group row col-lg-12" style="margin-top: 10px;text-align: left">
                                <label for="inputname2" class="col-lg-12 col-form-label"><strong>Chapo</strong></label>
                                <div class="col-lg-12">
                                <textarea id="inputname2" name="chapo" placeholder='J’ai pris un train en sens inverse. La voie était semée de roses et de ronces blessées. Les rails recouverts de charbons bleus métalliques.'
                                          class="form-control text-center"></textarea>
                                </div>
                            </div>
                            <div class="form-group row col-lg-12" style="margin-top: 10px;text-align: left">
                                <label for="inputname3" class="col-lg-12 col-form-label"><strong>Contenu</strong></label>
                                <div class="col-lg-12">
                        <textarea name="contained" id="inputname3" class="form-control text-center"
                                  placeholder="J’ai pris un train en sens inverse.La voie était semée de roseset de ronces blessées.Les rails recouvertsde charbons bleus métalliques.Le ciel lourd de promessesnon tenues, de rêves déchus, diffus,de désillusions tues, de séparations.Et sous la désolation de ce jour gris,je regardais, égarée, mon corpsscarifié de silence et de nuit.Le trajet était long,sans précise destination,comme dans un train fantômeeffaré de solitude crue, atoneau parfum déjà suride cendre et de suie.Au terminus, j’ai respiréun arôme de mort et de pluie."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" id="#inputwrite" data-toggle="modal"
                                        data-target="#exampleModal1" class="btn"><i
                                            class="rotate far fa-save fa-3x"></i>
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
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
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
                            aria-expanded="false" aria-controls="collapse4">
                        Demande de commentaire
                    </button>
                </h2>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm text-light">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Commentaire</th>
                                <th scope="col">Article</th>
                                <th scope="col">Date</th>
                                <th scope="col">Ajouter commentaire</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataAdminCommentary as $donne => $k) { ?>
                                <tr>
                                    <th scope="row"><?= $k[5] ?></th>
                                    <th>
                                        <button type="button" class="btn btn-primary" style="width: 180px"
                                                data-toggle="modal" data-target=".read<?= $k[1] ?>">Lire le commentaire
                                        </button>

                                        <div class="read<?= $k[1] ?> modal" tabindex="-1" role="dialog"
                                             aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class=""
                                                         style="color: black"><?= $k[1] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th><?= $k[3] ?></th>
                                    <th><?= $k[4] ?></th>
                                    <th>
                                        <button type="button" id="inputValidCom" data-toggle="modal"
                                                data-target="#validCom<?= $k[0] ?>"><i
                                                    class="rotate far fa-check-circle fa-1x"></i>
                                        </button>
                                        <button type="button" id="inputRefusalCom" data-toggle="modal"
                                                data-target="#refusalCom<?= $k[0] ?>"><i
                                                    class="rotate far fa-times-circle fa-1x"></i>
                                        </button>
                                        <div class="modal fade" id="validCom<?= $k[0] ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
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
                                                            <button type="submit" id="validCom" class="btn btn-primary">
                                                                Valider
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="refusalCom<?= $k[0] ?>" tabindex="-1" role="dialog"
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
                                                        Ete vous sur de vouloir Supprimer le Commentaire ?
                                                    </div>
                                                    <form action="?route=Refuser_Commentaire" method="post">
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $k[0] ?>"/>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Supprimer
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
                            aria-expanded="false" aria-controls="collapse5">
                        Demande d'inscription
                    </button>
                </h2>
            </div>
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm text-light">
                            <thead>
                            <tr>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Date d'inscription</th>
                                <th scope="col">Ajouter Admin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dataAdminUser as $donne => $k) { ?>
                                <tr>
                                    <th scope="row"><?= $k[1] ?></th>
                                    <th><?= $k[3] ?></th>
                                    <th><?= $k[4] ?></th>
                                    <th>
                                        <button type="button" id="inputValidUser" data-toggle="modal"
                                                data-target="#validUser<?= $k[0] ?>"><i
                                                    class="rotate far fa-check-circle fa-1x"></i>
                                        </button>
                                        <button type="button" id="inputRefusalUser" data-toggle="modal"
                                                data-target="#refusalUser<?= $k[0] ?>"><i
                                                    class="rotate far fa-times-circle fa-1x"></i>
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
                                                            <button type="submit" id="validUser"
                                                                    class="btn btn-primary">
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
                                                            <button type="submit" class="btn btn-primary">Supprimer
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

