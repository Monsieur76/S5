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
                            echo 'ajouté avec succès!';
                        }
                        elseif (isset($_POST['false_Admin'])) {
                            $datab_delete=$db->prepare('DELETE FROM admin WHERE id ='.$_POST['id'].'');
                            $data=$datab_delete->execute();
                            echo 'le refus a été éffectué avec succès';
                        }
                        else{
                            echo 'L\'utilisateur '.$donne['pseudo']. ' c\'est enregistrer et a pour mail ' .$donne['mail']. '<br>';?>
                            Voulez vous l'ajouter? <br><form action='Valid_Admin_view.php' method='POST'/>
                            <input type="hidden" name="id" value="<?= $donne['id'] ?>" />
                            <input type="submit" value='Valider' name="true_Admin" /> 
                            <input type="submit" value='Refuser' name="false_Admin" /><br><br><br></form><?php
                        } 
                    }
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
                            echo 'ajouté avec succès!';
                        }
                        elseif (isset($_POST['false_Admin'])) {
                            $datab_delete=$db->prepare('DELETE FROM commentary WHERE id ='.$_POST['id_commentary'].'');
                            $data=$datab_delete->execute();
                            echo 'le refus a été éffectué avec succès';
                        }
                        else{
                            echo 'Le commentaire<br>'.$donne['commentary'];?><br>
                            Voulez vous l'ajouter? <br>
                            <form action='Valid_Admin_commentaire_view.php' method='POST'/>
                            <input type="hidden" name="id_commentary" value="<?= $donne['id'] ?>" />
                            <input type="submit" value='Valider' name="true_Admin" /> 
                            <input type="submit" value='Refuser' name="false_Admin" /><br><br><br></form><?php
                        } 
                        
                    }
                    $this->true_false();
                }
                function true_false(){
                if (isset($_POST['true_Admin'])||isset($_POST['false_Admin'])){?>
                    <form action='Valid_Admin_commentaire_view.php' >
                        <input type='submit' name='back' value='revenir' /></form>
                <?php }}
            }
