<?php

namespace App\src\Controller;

use App\src\DAO\Commentary;
use App\src\DAO\Post;
use App\src\DAO\User;
use App\src\Model\View;
use App\src\Model\Token;

class BackController
{
    private $post;
    private $view;
    private $user;
    private $commentary;
    private $bool;

    public function __construct()
    {
        $this->user = new User;
        $this->view = new View;
        $this->post = new Post;
        $this->commentary = new Commentary;
    }

    public function controllerEmptyConnect($name, $pass)
    {
        $name = strip_tags($name);
        $pass = strip_tags($pass);
        $data = $this->user->connect();
        while ($donne = $data->fetch()) {
            if ($donne['pseudo'] == $name && $donne['pass'] == $pass & (strlen($name) <= 200) & (strlen($pass) <= 200)) {
                return $this->confirmConnect($name);
            }
        }
        $this->bool = false;
        return $this->view->render('connect_register_view', ['bool' => $this->bool]);
    }

    public function confirmConnect($name)
    {
        $_SESSION['pseudo'] = $name;
        $token = new Token;
        $token->token();
        $this->bool = true;
        $this->view->render('connect_register_view', ['bool' => $this->bool]);
    }

    public function isUserConnected()
    {
        return isset($_SESSION['pseudo']);
    }

    public function htmlTitleChapoPost($title, $chapo, $author, $contained)
    {

        $this->post->addPost($title, $chapo, $author, $contained);
    }

    public function deleteConfirm($id)
    {
        if ($id > 0) {
            $this->post->deletePostConfirm($id);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminTrueUser($id)
    {
        if ($id > 0) {
            $this->user->trueAdminWaitUser($id);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminTrueCommentary($id)
    {
        if ($id > 0) {
            $this->commentary->adminValidCommentary($id);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function deleteCommentary($id)
    {
        if ($id > 0) {
            $this->commentary->adminRefusalCommentary($id);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminUserTrue($id)
    {
        if ($id > 0) {
            $this->user->falseAdminWaitUser($id);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function logOut($logOut)
    {
        if (isset($logOut)) {
            session_unset();
            session_destroy();
            $this->bool = true;
            return $this->view->render('connect_register_view', ['bool' => $this->bool]);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function admin($bool)
    {
        $dataAdminUser = $this->user->adminWait();
        $dataAdminCommentary = $this->commentary->adminValidCom();
        $dataDelete = $this->post->deletePost();
        $data = $this->post->postSelect();
        $this->view->render('backend', ['data' => $data, 'dataDelete' => $dataDelete,
            'dataAdminCommentary' => $dataAdminCommentary, 'dataAdminUser' => $dataAdminUser, 'bool' => $bool]);
    }

    public function htmlTitleChapo($title, $chapo, $author, $contained, $id)
    {
        $title = strip_tags($title);
        $chapo = strip_tags($chapo);
        $contained = strip_tags($contained);
        $author = strip_tags($author);
        $post = $id;
        $Post = new Post;
        if ($post > 0 & (strlen($title) <= 1000) & (strlen($chapo) <= 2000) & (strlen($contained) <= 10000)
            & (strlen($author) <= 200)) {
            $Post->updatePost($title, $chapo, $contained, $author, $post);
            $this->bool = true;
            return $this->admin($this->bool);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function addPostConfirmationTrue($title, $chapo, $author, $contained)
    {
        if (!empty($title) & !empty($author) & !empty($chapo) & !empty($contained) & (strlen($title) <= 1000)
            & (strlen($chapo) <= 2000) & (strlen($contained) <= 10000) & (strlen($author) <= 200)) {
            $chapo = strip_tags($chapo);
            $title = strip_tags($title);
            $contained = strip_tags($contained);
            $author = strip_tags($author);
            $this->htmlTitleChapoPost($title, $chapo, $author, $contained);
            $this->bool = true;
        } else {
            $this->bool = false;
        }
        return $this->admin($this->bool);
    }
}
