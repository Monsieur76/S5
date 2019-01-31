<?php require_once('database.php');

            class Valid
            {   
                function admin_wait()
                {
                    $db = Database::get();
                    $datab_valid=$db->prepare('SELECT * FROM admin WHERE register=0');
                    $data=$datab_valid->execute();
                    while ($donne=$datab_valid->fetch()) {
                        if (isset($_POST['true_Admin'])) {
                            $datab_update = $db->prepare('UPDATE admin SET register=1 WHERE id='.$_POST['id'].'');
                            $data = $datab_update->execute();
                        }
                        elseif (isset($_POST['false_Admin'])) {
                            $datab_delete=$db->prepare('DELETE FROM admin WHERE id ='.$_POST['id'].'');
                            $data=$datab_delete->execute();
                        }
                        else{?> <div class="row"><h5><?php
                            echo 'L\'utilisateur '.$donne['pseudo']. ' c\'est enregistrer et a pour mail '
                                .$donne['mail']. '<br>';?></h5>
                        </div>
                            <h4> Voulez vous l'ajouter?</h4> <br>
                            <div class="row">
                            <form action='Valid_Admin_view.php' method='POST' class="form-group"/>
                            <input type="hidden" name="id" value="<?= $donne['id'] ?>" />
                            <input type="submit" value='Valider' name="true_Admin" style="width: 100px;height: 30px;"
                                   class="btn-dark form-control"/>
                            <input type="submit" value='Refuser' name="false_Admin" style="width: 100px;height: 30px;"
                                   class="btn-dark form-control"/>
                            </form>
                            </div><?php
                        } 
                    }
                    $datab_valid->closeCursor();
                    $this->true_false();
                }
                function admin_valid_com()
                {
                    $db = Database::get();
                    $datab_valid_com=$db->prepare('SELECT * FROM commentary WHERE  register_valid =0');
                    $data=$datab_valid_com->execute();
                    while ($donne=$datab_valid_com->fetch()) {
                        if (isset($_POST['true_Admin'])) {
                            $datab_valid = $db->prepare('UPDATE commentary SET  register_valid =1 WHERE id='.$_POST['id_commentary'].'');
                            $data = $datab_valid->execute();

                        }
                        elseif (isset($_POST['false_Admin'])) {
                            $datab_delete=$db->prepare('DELETE FROM commentary WHERE id ='.$_POST['id_commentary'].'');
                            $data=$datab_delete->execute();

                        }
                        else{?> <div class="row"><h5><?php
                                echo 'Le commentaire<br>'.$donne['commentary'];?></h5>
                        </div>
                            <div class="row">
                                <h5>Voulez vous l'ajouter? </h5>
                            </div>
                            <div class="row">
                            <form action='Valid_Admin_commentaire_view.php' method='POST' class="form-group"/>
                            <input type="hidden" name="id_commentary" value="<?= $donne['id'] ?>" />
                            <input type="submit" value='Valider' name="true_Admin" class="btn-dark form-control"
                                   style="width: 100px;height: 30px;"/>
                            <input type="submit" value='Refuser' name="false_Admin" class="btn-dark form-control"
                                   style="width: 100px;height: 30px;"/>
                            </div>
                            </form><?php
                        } 
                        
                    }
                    $datab_valid_com->closeCursor();
                    $this->true_false();
                }
                function true_false(){
                if (isset($_POST['true_Admin'])||isset($_POST['false_Admin'])){?>
                    <div class="row">
                    <form action='Valid_Admin_commentaire_view.php' class="form-group">
                        <input type='submit' name='back' value='revenir' class="btn-dark form-control" style="width: 100px;height: 30px;"/></form>
                    </div>
                <?php }}
                function token ()
                {
                    $mincarac = str_shuffle('azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBNé');
                    $token = '';
                    srand((double) microtime() * 1000000); 
                    for ($i = 0 ; $i < 20 ; $i++)
                    {
                        $token .= $mincarac[rand()%strlen($mincarac)];
                    }
                    $token = utf8_encode ( $token);
                    $_SESSION['token'] = $token ;
                }
                
            }
