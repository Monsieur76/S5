<?php

namespace App\src\DAO;

use App\src\Model\View;
use \Exception;

class User
{
    protected $view;
    protected $db;

    function __construct()
    {
        $this->view = new View;
        $this->db = Database::get();
    }

    public function connect()
    {
        $data = $this->db->prepare('SELECT * FROM admin WHERE register=1');
        $data->execute();
        return $data;
    }

    public function registerNew($name, $pass, $mail)
    {
        try {
            $data = $this->db->prepare('INSERT INTO admin (pseudo,pass,mail,register,date_user)
            VALUES (?,?,?,?,NOW())');
            $data->execute(array($name, $pass, $mail, 0));
            return $data;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function duplicationMail($mail)
    {
        $sql = "SELECT id FROM admin WHERE mail = ? ";
        $data = $this->db->prepare($sql);
        $data->execute([$mail]);
        $donne = $data->fetch();
        return $donne['id'];
    }

    public function duplicationUser($name)
    {
        $sql = "SELECT id FROM admin WHERE pseudo = ?";
        $data = $this->db->prepare($sql);
        $data->execute([$name]);
        $donne = $data->fetch();
        return $donne['id'];
    }

    public function adminWait()
    {
        $sql = "SELECT id,pseudo,pass,mail,DATE_FORMAT(date_user,'%d/%m/%Y %H:%i:%s')AS dateUser 
                FROM admin WHERE register=0 ORDER BY date_user DESC ";
        $data = $this->db->prepare($sql);
        $data->execute();
        return $data;
    }

    public function trueAdminWaitUser($id)
    {
        $sql = "UPDATE admin SET register=1 WHERE id=?";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
    }

    public function falseAdminWaitUser($id)
    {
        $sql = "DELETE FROM admin WHERE id =?";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
    }
}