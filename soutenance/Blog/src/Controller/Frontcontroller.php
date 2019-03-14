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
        $this->view->render('registration_view');
    }

    public function home()
    {
        $this->view->render('index_view');
    }

    public function displayPost()
    {
        $post = $this->post->postSelectDisplay();
        $this->view->render('display_post_list_view', ['post' => $post]);
    }

    public function connect()
    {
        $this->view->render('connect_register_view');
    }

    public function displayPostList($id)
    {
        $commentary = $this->commentary->commentary($id);
        $post = $this->post->displayPost($id)->fetch();
        if ($post > 0) {
            return $this->view->render('post_display_view', ['post' => $post,
                'commentary' => $commentary, 'id' => $id]);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function addConfirmCommentary($id, $com, $name)
    {
        if ($id > 0 & !empty($com)) {
            $this->commentary->insertCom($id, $com, $name);
            return $this->view->render('return_display');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function emptyCaractere()
    {
        $this->view->render('empty_or_wrong_registration');
    }

    public function false()
    {
        $this->view->render('false');
    }

    public function controllerEmptyRegister($name, $pass, $mail)
    {
        $name = strip_tags($name);
        $pass = strip_tags($pass);
        $mail = strip_tags($mail);
        $sql = $this->user->duplicationMail($mail);
        if ($sql === null) {
            $this->user->registerNew($name, $pass, $mail);
            return $this->view->render('trueRegister');
        } else {
            return $this->view->render('duplication_mail');
        }
    }

    public function displayPostControlList()
    {
        $this->post->postSelectDisplay();
    }

    public function htmlTitleChapo($title, $chapo, $author, $contained, $id)
    {
        $title = strip_tags($title);
        $chapo = strip_tags($chapo);
        $contained = strip_tags($contained);
        $author = strip_tags($author);
        $post = $id;
        $Post = new Post;
        if ($post > 0) {
            $Post->updateUser($title, $chapo, $contained, $author, $post);
            return $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function addPostConfirmationTrue($title, $chapo, $author, $contained)
    {
        if (!empty($title) & !empty($author) & !empty($chapo) & !empty($contained)) {
            $chapo = strip_tags($chapo);
            $title = strip_tags($title);
            $contained = strip_tags($contained);
            $author = strip_tags($author);
            $this->control->htmlTitleChapoPost($title, $chapo, $author, $contained);
            return $this->view->render('true');
        }
    }

    public function adminUserTrue()
    {
        $this->view->render('true');
    }

    public function erreurRegister()
    {
        $this->view->render('empty_or_wrong_registration');
    }

    public function confirmationModificationComentaire($title, $chapo, $contained, $author, $id)
    {
        $this->view->render('form_modification', ['title' => $title, 'chapo' => $chapo,
            'contained' => $contained, 'author' => $author, 'id' => $id]);
    }
}
