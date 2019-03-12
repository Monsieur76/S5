<?php
namespace App\src\Model;

use App\src\DAO\Database;

class Search
{
    private $db;

    function __construct()
    {
        $this->db = Database::get();
    }

    public function run($search)
    {
        $sql = "SELECT * FROM post,commentary";
        $data = $this->db->prepare($sql);
        $data->execute();
        foreach ($data as $donne => $k) {
                echo $donne['title'];
        }
        echo 'lol';
    }
}