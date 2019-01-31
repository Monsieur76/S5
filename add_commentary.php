<?php 
class Commentary
{   
    function insert_com()
    {
            $db = Database::get();
            $com=($_POST['Com']);
            $id = intval($_POST['id_post']);
            $datab = $db->prepare('INSERT INTO commentary (commentary,id_post,register_valid) Value (?,?,?)');
            $data = $datab->execute(array($com , $id , 0 ));
            $datab->closeCursor();
    }
    function add_com()
    {
        $id = $_POST['id_com'];?>
        <form action = 'add_commentary_view2.php' method = 'POST' class="form-group">
        <input type = "text" name = "Com" placeholder = 'Commentaire' style = "width:600px;height:200px;" class="form-control" />
            <div class="row">
        <input type = 'submit' name ='update_commentary' value = 'Ajouter' class="btn-dark form-control"
               style="width: 100px;height: 30px;"/>
            <input type = 'hidden' name = 'id_post' value = '<?= $id?>' ></form></div><?php
    }
}