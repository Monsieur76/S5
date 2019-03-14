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
        $aData = $data->fetch();
        if ($aData['pseudo'] == $name && $aData['pass'] == $pass) {
            $_SESSION['pseudo'] = $name;
            $token = new Token;
            $token->token();
            $this->view->render('connexion_true');
        } else {
            $this->view->render('empty_or_wrong_registration');
        }
        $data->closeCursor();
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
            $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminTrueUser($id)
    {
        if ($id > 0) {
            $this->user->trueAdminWaitUser($id);
            $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminTrueCommentary($id)
    {
        if ($id > 0) {
            $this->commentary->adminValidCommentary($id);
            $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function deleteCommentary($id)
    {
        if ($id > 0) {
            $this->commentary->adminRefusalCommentary($id);
            $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function adminUserTrue($id)
    {
        if ($id > 0) {
            $this->user->falseAdminWaitUser($id);
            $this->view->render('true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function logOut($logOut)
    {
        if (isset($logOut)) {
            session_unset();
            session_destroy();
            return $this->view->render('deconnexion_true');
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function admin()
    {
        $dataAdminUser = $this->user->adminWait();
        $dataAdminCommentary = $this->commentary->adminValidCom();
        $dataDelete = $this->post->deletePost();
        $data = $this->post->postSelect();
        $this->view->render('backend', ['data' => $data, 'dataDelete' => $dataDelete,
            'dataAdminCommentary' => $dataAdminCommentary, 'dataAdminUser' => $dataAdminUser]);
    }
}
