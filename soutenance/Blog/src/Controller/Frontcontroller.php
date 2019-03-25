<?php

namespace App\src\Controller;

use App\src\DAO\Post;
use App\src\DAO\Commentary;
use App\src\DAO\User;
use App\src\Model\Contact;
use App\src\Model\View;

class FrontController
{
    private $view;
    private $post;
    private $commentary;
    private $control;
    private $user;
    private $bool;

    public function __construct()
    {
        $this->user = new User;
        $this->post = new Post;
        $this->view = new View;
        $this->commentary = new Commentary;
        $this->control = new BackController;
    }

    /**
     *
     */
    public function registration()
    {
        $this->bool = false;
        $this->view->render('registration_view', ['bool' => $this->bool]);
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
        $this->bool = false;
        $this->view->render('connect_register_view', ['bool' => $this->bool]);
    }

    public function displayPostList($id)
    {
        $commentary = $this->commentary->commentary($id);
        $post = $this->post->displayPost($id)->fetch();
        if ($post > 0) {
            $this->bool = false;
            return $this->view->render('post_display_view', ['post' => $post,
                'commentary' => $commentary, 'id' => $id, 'bool' => $this->bool]);
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function addConfirmCommentary($id, $com, $name)
    {
        if ($id > 0 ){
            $commentary = $this->commentary->commentary($id);
            $post = $this->post->displayPost($id)->fetch();
            if (!empty($com) & (strlen($name) <= 200) & (strlen($com) <= 2000)) {
            $this->commentary->insertCom($id, $com, $name);
            $this->bool = true;
            return $this->view->render('post_display_view', ['post' => $post,
                'commentary' => $commentary, 'id' => $id, 'bool' => $this->bool]);}
            else{
                $bool = null;
                return $this->view->render('post_display_view', ['post' => $post,
                    'commentary' => $commentary, 'id' => $id, 'bool' => $this->bool]);
            }
        } else {
            return $this->view->render('erreur_404');
        }
    }

    public function controllerEmptyRegister($name, $pass, $mail)
    {
        $name = strip_tags($name);
        $pass = strip_tags($pass);
        $mail = strip_tags($mail);
        $sqlName = $this->user->duplicationUser($name);
        $sqlMail = $this->user->duplicationMail($mail);
        if ($sqlMail === null & $sqlName === null) {
            $this->user->registerNew($name, $pass, $mail);
            $this->bool = true;
            return $this->view->render('registration_view', ['bool' => $this->bool]);
        } else {
            return $this->duplication();
        }
    }

    public function duplication()
    {
        $this->bool = null;
        $this->view->render('registration_view', ['bool' => $this->bool]);
    }

    /**
     *
     */
    public function displayPostControlList()
    {
        $this->post->postSelectDisplay();
    }

    public function errorRegister()
    {
        $this->bool = false;
        $this->view->render('connect_register_view', ['bool' => $this->bool]);
    }
    public function contact($object,$message,$sender)
    {
        $contact = new Contact;
        $contact->Send($object, $message, $sender);
    }
}
