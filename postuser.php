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
?>                  <form method='POST' >
                    <input type='submit' name='modifie' value='Modifier' />
                    <input type='hidden' name='id_post_modifie' value="<?=$donne['id']; ?>" />
                    <input type='hidden' name='title' value="<?=$donne['title']; ?>" />
                    <input type='hidden' name='chapo' value="<?=$donne['chapo']; ?>" />
                    <input type='hidden' name='contained' value="<?=$donne['contained']; ?>" />
                    <input type='hidden' name='author' value="<?=$donne['author']; ?>" />
                    <br><br><br></form><?php                
                }

    
                if (isset($_POST['modifie'])){
                    ?><form action='add2.php' method='POST' ><?php
                    echo $_POST['title'];?>
                    <br><input type="text" name="title" value="<?=$_POST['title']; ?>" placeholder='Titre'/><br>
                    <?php echo $_POST['chapo'];?>
                    <br><input type="text" name="chapo" placeholder='Châpo' value="<?=$_POST['chapo']; ?>" style="width:300px;"/><br>
                    <?php echo $_POST['contained'];?>
                    <br><input type="text" name="contained" value="<?=$_POST['contained']; ?>" placeholder='Contenue' style="width:600px;height:200px;"/><br>
                    <?php echo $_POST['author'];?>
                    <br><input type="text" name="author" value="<?=$_POST['author']; ?>" placeholder='Auteur' /><br>
                    <input type='submit' name='update_post' value='Modifier' />
                    <input type='hidden' name='id_update_post' value="<?= $_POST['id_post_modifie']; ?>" /></form><?php
                }
    }

        function post_select_display()
        {   
            $db = Database::get();
            $datab_select = $db->prepare('SELECT * FROM post ORDER BY date_post DESC');
            $data = $datab_select->execute();
                while ($donne = $datab_select->fetch()){   
                    
                        echo $donne['title'].'    '.$donne['date_post'].'<br>'.$donne['chapo'].'<br>';
?>                  <form action='post_display_view.php' method='POST' >
                    <input type = 'submit' name = 'display_poste' value = 'afficher' />
                    <input type = 'hidden' name = 'id_post_select_display' value = "<?= $donne['id'];?>" /><br></form>
                    <?php                 
                    
                }
        }
    function display_post()
        {
            if ($_POST['display_poste']){
                $post_id = $_POST['id_post_select_display'];
                $db = Database::get();
                $datab_selec=$db->prepare('SELECT * FROM post WHERE id = '.$post_id.'');
                $data = $datab_selec->execute();
            
                    while ($donne = $datab_selec->fetch()){
                        echo '<br>'.$donne['title'].'    '.$donne['date_post'].'<br>'.$donne['contained'].'<br>'.$donne['author'].'<br>';
                    }
                    ?>  <form action='display_post_liste_view.php' >
                    <input type='submit' name='back' value='retour a la liste des postes' /></form>
                    <form action='add_commentary_view.php' method='POST'>
                    <input type='submit' name='add_com' value='ajouter commentaire' />
                    <input type = 'hidden' name = 'id_com' value = '<?= $post_id?>' > </form>
                    <?php
                $datab_selec=$db->prepare('SELECT * FROM post INNER JOIN commentary ON post.id = commentary.id_post WHERE post.id = '.$post_id.' 
                                                                                                                    AND commentary.register_valid = 1 ');
                $data = $datab_selec->execute();
                    while ($donne = $datab_selec->fetch()){
                        echo '<br>'.$donne['commentary'].'<br>';
                    }

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

                else {
                echo $donne['title'].'    '.$donne['date_post'].'<br>'.$donne['chapo'];?>
                <form action='delete_post_view.php' method='POST'  >
                    <input type='submit' name='delete' value='Supprimer' />
                    <input type='hidden' name='id_delete' value='<?=$donne['id'];?>' />
                    </form> <?php
                }
            }
        }
    }
  
