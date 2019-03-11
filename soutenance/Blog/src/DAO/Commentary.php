<?php

namespace App\src\DAO;
class Commentary
{
    protected $db;

    function __construct()
    {
        $this->db = Database::get();
    }

    public function insertCom($id, $com, $name)
    {
        $sql = "INSERT INTO commentary (commentary,id_post,register_valid, name ,date_com)
            VALUE (?,?,?,?,NOW())";
        $data = $this->db->prepare($sql);
        $data->execute([$com, $id, 0, $name]);
    }

    public function adminValidCom()
    {
        $data = $this->db->prepare('SELECT c.id , c.commentary , 
        c.register_valid ,p.title,DATE_FORMAT(c.date_com,\'%d/%m/%Y %Hh%imin%ss\')AS datePost,
        c.name FROM commentary AS c INNER JOIN post AS p
        ON c.id_post = p.id WHERE c.register_valid = 0 ORDER BY date_com DESC');
        $data->execute();
        return $data;

    }

    public function adminValidCommentary($id)
    {
        $sql = "UPDATE commentary SET  register_valid =1 WHERE id=?";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
    }

    public function adminRefusalCommentary($id)
    {
        $sql = "DELETE FROM commentary WHERE id = ?";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
    }

    public function commentary($id)
    {
        $sql = "SELECT c.commentary,name,DATE_FORMAT(c.date_com ,'%d/%m/%Y %Hh%imin%ss')AS date_com FROM post AS p INNER JOIN 
            commentary AS c ON p.id = c.id_post WHERE p.id =? 
            AND c.register_valid = 1 ORDER BY date_com DESC";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
        return $data;
    }
}