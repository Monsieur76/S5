<?php
class Manage_Post
{
    function post_select()
    {
        $dab = Database::get();
        $datab_select=$dab->prepare('SELECT * FROM post');
        $data=$datab_select->execute();
            while ($donne=$datab_select->fetch()){
                    echo $donne['title'];
?>                  <div class="row">
                <form method='POST' class="form-group">
                    <input type='submit' name='modifie' value='Modifier' class="btn-dark form-control"
                           style="width: 100px;height: 30px;"/>
                    <input type='hidden' name='id_post_modifie' value="<?=$donne['id']; ?>" />
                    <input type='hidden' name='title' value="<?=$donne['title']; ?>" />
                    <input type='hidden' name='chapo' value="<?=$donne['chapo']; ?>" />
                    <input type='hidden' name='contained' value="<?=$donne['contained']; ?>" />
                    <input type='hidden' name='author' value="<?=$donne['author']; ?>" />
                </form>
                </div><?php
                }


                if (isset($_POST['modifie'])){


                    ?><div class="row">
                    <form action='add2.php' method='POST' class="form-group" ><?php
                    echo $_POST['title'];?>
                    <br><input type="text" name="title" value="<?=$_POST['title']; ?>"
                               class="form-control text-center"/><br>
                    <?php echo $_POST['chapo'];?>
                    <br><input type="text" name="chapo" value="<?=$_POST['chapo']; ?>"
                               class="form-control text-center"/><br>
                    <?php echo $_POST['contained'];?>
                    <br><textarea type="text" name="contained" value="<?=$_POST['contained']; ?>"
                                  class="form-control text-center" style = "width:300px;height:100px;"></textarea><br>
                    <?php echo $_POST['author'];?>
                    <br><input type="text" name="author" value="<?=$_POST['author']; ?>"
                               class="form-control text-center"/><br>
                    <input type='submit' name='update_post' value='Modifier' class="btn-dark form-control"
                           style="width: 100px;height: 30px;"/>
                        <input type='hidden' name='id_update_post' value="<?= $_POST['id_post_modifie']; ?>" /></form>
                    </div><?php
                }
        $datab_select->closeCursor();
    }

        function post_select_display()
        {
            $db = Database::get();
            $datab_select = $db->prepare('SELECT * FROM post ORDER BY date_post DESC');
            $data = $datab_select->execute();
                while ($donne = $datab_select->fetch()){
?><div class="row"><?php
                        echo $donne['title'].'    '.$donne['date_post'].'<br>'.$donne['chapo'].'<br>';

?>                  </div>
                    <div class="row">
                    <form action='post_display_view.php' method='POST' class="form-group">
                    <input type = 'submit' name = 'display_poste' value = 'afficher' class="btn-dark form-control"
                           style="width: 100px;height: 30px;"/>
                    <input type = 'hidden' name = 'id_post_select_display' value = "<?= $donne['id'];?>" />
                    </div>
                    </form>
                    <?php

                }
            $datab_select->closeCursor();
        }
    function display_post()
        {
            if ($_POST['display_poste']){
                $post_id = $_POST['id_post_select_display'];
                $db = Database::get();
                $datab_selec=$db->prepare('SELECT * FROM post WHERE id = '.$post_id.'');
                $data = $datab_selec->execute();

                    while ($donne = $datab_selec->fetch()){?><div class="row"><?php
                        echo '<br>'.$donne['title'].'    '.$donne['date_post'].'<br>'.$donne['contained'].'
<br>'.$donne['author'].'<br>';
                    }
                ?></div>
                    <div class="row">
                <form action='display_post_liste_view.php' class="form-group" >
                    <input type='submit' name='back' value='retour a la liste des postes' class="btn-dark form-control"
                           style="width: 200px;height: 50px;"/></form></div>
                <div class="row">
                    <form action='add_commentary_view.php' method='POST' class="form-group">
                    <input type='submit' name='add_com' value='ajouter commentaire' class="btn-dark form-control"
                           style="width: 200px;height: 50px;"/>
                        <input type = 'hidden' name = 'id_com' value = '<?= $post_id?>' > </form>
                    </div>
                <div class="row border-bottom">
                        <h2>Commentaire</h2>
                </div>
                <div class="row">
                    <?php
                $datab_selec=$db->prepare('SELECT * FROM post INNER JOIN commentary ON post.id = commentary.id_post WHERE post.id = '.$post_id.' 
                                                                                                                    AND commentary.register_valid = 1 ');
                $data = $datab_selec->execute();
                    while ($donne = $datab_selec->fetch()){
                        echo '<br>'.$donne['commentary'].
                            '<br>';
                    }
                    ?>
                    </div>
                <?php
                $datab_selec->closeCursor();
            }
        }

}
class Post_User
    {
        public $title;
        public $chapo;
        public $contained;
        public $author;

            function update_user($title,$chapo,$contained,$author,$post)
            {
                try{
                    $db = Database::get();
                    $update = "UPDATE post SET title=? , chapo=?, contained=? , author=? , date_post=NOW() WHERE id=?";
                    $datab_update=$db->prepare($update);
                    $data=$datab_update->execute(array($title,$chapo,$contained,$author,$post));
                }
                    catch (Exception $e){
                    $e->getMessage();
                }
            }
    }

    class Post extends Post_User
    {
        public $date;
        function add_post($title,$chapo,$contained,$author)
        {
            $db = Database::get();
            try{
                $data = $db->prepare('INSERT INTO post (title,chapo,contained,author,date_post) VALUES (?,?,?,?,NOW())') or die(print_r($database->errorInfo()));
                $data->execute(array($title,$chapo,$contained,$author));
                $data->closeCursor();
            }
                catch (Exception $e){
                $e->getMessage();
            }
        }
        function delete_post()
        {
            $db = Database::get();
            $datab_select=$db->prepare('SELECT * FROM post');
            $data=$datab_select->execute();
            while ($donne=$datab_select->fetch()){
                if (isset($_POST['delete'])){
                    $id = $_POST['id_delete'];
                    $delete_post_ = "DELETE  FROM post WHERE post.id = '$id'";
                    $delete_post_com = "DELETE post , commentary FROM post INNER JOIN commentary ON post.id = commentary.id_post WHERE post.id = '$id'";
                    $datab_delete=$db->prepare($delete_post_com);
                    $datab_delet=$db->prepare($delete_post_);
                    $data = $datab_delete->execute();
                    $data = $datab_delet->execute();
                }

                else {?><div class="row"> <h5> <?php
                        echo $donne['title'].'<br>'.$donne['date_post'].'<br>'.$donne['chapo'];?></h5>
                    </div>
                    <div class="row">
                <form action='delete_post_view.php' method='POST' class="form-group" >
                    <input type='submit' name='delete' value='Supprimer' class="btn-dark form-control"
                           style="width: 100px;height: 30px;"/>
                    <input type='hidden' name='id_delete' value='<?=$donne['id'];?>' />
                </form>
                    </div>
                    <?php
                }
            }
        }
    }

