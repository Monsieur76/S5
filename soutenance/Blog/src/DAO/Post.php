<?php

namespace App\src\DAO;

use \Exception;

class Post
{
    private $db;

    function __construct()
    {
        $this->db = Database::get();
    }

    public function addPost($title, $chapo, $author, $contained)
    {
        try {
            $sql = "INSERT INTO post (title,chapo,contained,author,date_post)
                    VALUES (?,?,?,?,NOW())";
            $data = $this->db->prepare($sql);
            $data->execute(array($title, $chapo, $contained, $author));
            $data->closeCursor();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function SelectPostForDelete()
    {
        $sql = "SELECT title,chapo,id,author,DATE_FORMAT(date_post,'%d/%m/%Y %H:%i:%s')AS datePost FROM post 
                ORDER BY date_post DESC ";
        $data = $this->db->prepare($sql);
        $data->execute();
        return $data;
    }

    public function deletePostConfirm($id)
    {
        $delete = "DELETE  FROM post WHERE post.id = ?";
        $deleteCom = "DELETE post , commentary FROM post INNER JOIN
                      commentary ON post.id = commentary.id_post WHERE post.id = ?";
        $data = $this->db->prepare($deleteCom);
        $database = $this->db->prepare($delete);
        $data->execute([$id]);
        $database->execute([$id]);
    }

    public function postSelect()
    {
        $sql = "SELECT id,title,chapo,contained,author,DATE_FORMAT(date_post,'%d/%m/%Y %H:%i:%s')
                AS datePost FROM post ORDER BY date_post DESC ";
        $data = $this->db->prepare($sql);
        $data->execute();
        return $data;
    }

    /*
     *
     */
    public function postSelectDisplay()
    {
        $sql = "SELECT title,chapo,id,DATE_FORMAT(date_post,'%d/%m/%Y %H:%i:%s')AS datePost
                FROM post ORDER BY date_post DESC ";
        $data = $this->db->prepare($sql);
        $data->execute();
        return $data;
    }

    public function displayPost($id)
    {
        $sql = "SELECT id,contained,title,chapo,author,DATE_FORMAT(date_post,'%d/%m/%Y %H:%i:%s')AS date_post
                FROM post WHERE id = ?";
        $data = $this->db->prepare($sql);
        $data->execute([$id]);
        return $data;
    }

    public function updatePost($post)
    {
        $update = "UPDATE post SET title = ? , chapo = ?, contained = ? , author = ? ,
            date_post = NOW() WHERE id = ?";
        $data = $this->db->prepare($update);
        $data->execute(array($post['title'], $post['chapo'], $post['contained'],
            $post['author'], $post['id']));
    }
}