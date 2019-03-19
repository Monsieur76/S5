<?php

namespace App\src\Controller;

use App\src\DAO\Post;
use App\src\DAO\Commentary;
use App\src\DAO\User;
use App\src\Model\View;

class FrontController
{
    private $view;
    private $post;
    private $commentary;
    private $control;
    private $user;

    public function __construct()
    {
        $this->user = new User;
        $this->post = new Post;
        $this->view = new View;
        $this->commentary = new Commentary;
        $this->control = new BackController;
    }

    public function registration()
    {
        $bool = false;
        $this->view->render('registration_view', ['bool' => $bool]);
    }

    public function home($bool)
    {
        $this->view->render('index_view', ['bool' => $bool ]);
    }

    public function displayPost()
    {
        $post = $this->post->postSelectDisplay();
        $this->view->render('display_post_list_view', ['post' => $post]);
    }

    public function connect()
    {
        $bool = false;
        $this->view->render('connect_register_view', ['bool' => $bool]);
    }

    public function displayPostList($id)
    {
        $commentary = $this->commentary->commentary($id);
        $post = $this->post->displayPost($id)->fetch();
        if ($post > 0) {
            $bool = false;
            return $this->view->render('post_display_view', ['post' => $post,
                'commentary' => $commentary, 'id' => $id, 'bool' => $bool]);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function addConfirmCommentary($id, $com, $name)
    {
        if ($id > 0 & !empty($com) & (strlen($name) <= 200) & (strlen($com) <= 10000)) {
            $this->commentary->insertCom($id, $com, $name);
            $bool = true;
            $commentary = $this->commentary->commentary($id);
            $post = $this->post->displayPost($id)->fetch();
            return $this->view->render('post_display_view', ['post' => $post,
                'commentary' => $commentary, 'id' => $id, 'bool' => $bool]);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function controllerEmptyRegister($name, $pass, $mail)
    {
        $name = strip_tags($name);
        $pass = strip_tags($pass);
        $mail = strip_tags($mail);
        $sql = $this->user->duplicationMail($mail);
        if ($sql === null) {
            $this->user->registerNew($name, $pass, $mail);
            $bool = true;
            return $this->view->render('registration_view', ['bool' => $bool]);
        } else {
            return $this->duplication();
        }
    }

    public function duplication()
    {
        $bool = null;
        $this->view->render('registration_view', ['bool' => $bool]);
    }

    public function displayPostControlList()
    {
        $this->post->postSelectDisplay();
    }

    public function erreurRegister()
    {
        $bool = false;
        $this->view->render('connect_register_view', ['bool' => $bool]);
    }

    public function confirmationModificationComentaire($title, $chapo, $contained, $author, $id)
    {
        $this->view->render('form_modification', ['title' => $title, 'chapo' => $chapo,
            'contained' => $contained, 'author' => $author, 'id' => $id]);
    }
}
