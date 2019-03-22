<?php

namespace App\Config;

use App\src\Controller\BackController;
use App\src\Controller\Frontcontroller;
use App\src\Model\Form;

class Router
{
    private $front;
    private $control;
    private $bool;

    function __construct()
    {
        $this->front = new Frontcontroller;
        $this->control = new BackController;
        $this->bool = false;
    }

    public function validCommentary()
    {
        if (!empty($_POST['com']) & !empty($_POST['name'])) {
            $id_post = intval($_POST['id']);
            $id = strip_tags(htmlspecialchars($id_post));
            $name = strip_tags(htmlspecialchars($_POST['name']));
            $com = strip_tags(htmlspecialchars($_POST['com']));
            $this->front->addConfirmCommentary($id, $com, $name);
        } else {
             $this->front->displayPostList($_POST['id']);
        }
    }

    public function confirmAddPost()
    {
        if (!empty($_POST['title']) & !empty($_POST['chapo'])
            & !empty($_POST['author']) & !empty($_POST['contained'])) {
            $chapo = strip_tags($_POST['chapo']);
            $title = strip_tags($_POST['title']);
            $contained = strip_tags($_POST['contained']);
            $author = strip_tags($_POST['author']);
            $this->control->addPostConfirmationTrue($title,
                $chapo, $author, $contained);
        } else {
            $this->control->admin($this->bool);
        }
    }

    public function confirmUpdatePost()
    {
        $post = ['title' => $_POST['title'], 'chapo' => $_POST['chapo'],
            'author' => $_POST['author'], 'contained' => $_POST['contained'], 'id' => $_POST['id_post']];
        $this->control->htmlTitleChapo($post);
    }

    public function homeFunction()
    {
        $this->front->home($this->bool);
    }

    public function registerGood()
    {
        if (isset($_POST['submit_register']) & !empty($_POST['mail']) &
            !empty($_POST['name']) & !empty($_POST['pass_register']) & preg_match
            ("#[a-zA-Z0-9-]@[a-zA-Z0-9-].+[a-zA-Z0-9-]#", $_POST['mail']) & (strlen($_POST['mail']) <= 100)
            & (strlen($_POST['name']) <= 100) & (strlen($_POST['pass_register']) <= 100)) {
            $this->front->controllerEmptyRegister($_POST['name'],
                $_POST['pass_register'], $_POST['mail']);
        } else {
            $this->front->registration();
        }
    }

    public function contact()
    {
        if (!empty($_POST['first_name']) &&
            !empty($_POST['mail']) && !empty($_POST['message'])) {
            $name = strip_tags(htmlspecialchars($_POST['name']));
            $first = strip_tags(htmlspecialchars($_POST['first_name']));
            $object = [$name, $first];
            $message = strip_tags(htmlspecialchars($_POST['message']));
            $sender = strip_tags(htmlspecialchars($_POST['mail']));
            $this->front->contact($object, $message, $sender);
        } else {
             $this->homeFunction();
        }
    }

    public function updatePost()
    {
        if (!empty($_POST['title']) & !empty($_POST['chapo'])
            & !empty($_POST['author']) & !empty($_POST['contained'])) {
            $this->confirmUpdatePost();
        } else {
             $this->control->admin($this->bool);
        }
    }

    public function good()
    {
        if (!empty($_POST['name_connect']) && !empty($_POST['password_connect'])) {
             $this->control->controllerEmptyConnect($_POST['name_connect'],
                $_POST['password_connect']);
        } else {
             $this->front->connect();
        }
    }

    public function run()
    {
        if (isset($_GET['route'])) {
            switch ($_GET['route']) {
                case 'Enregistrement':
                    $this->front->registration();
                    break;
                case 'Accueil':
                    $this->homeFunction();
                    break;
                case 'liste_des_Articles':
                    $this->front->displayPost();
                    break;
                case 'Connexion':
                    $this->front->connect();
                    break;
                case 'Afficher_un_Article':
                    $this->front->displayPostList($_POST['id']);
                    break;
                case 'Validation_de_Suppression':
                    $this->control->deleteConfirm($_POST['id']);
                    break;
                case 'Validation_de_Commentaire':
                    $this->validCommentary();
                    break;
                case 'connexion_accomplie':
                    $this->good();
                    break;
                case 'Confirmation_Ajout_Article':
                    $this->confirmAddPost();
                    break;
                case 'confirmation_modification_article':
                    $this->confirmUpdatePost();
                    break;
                case 'Confirmation_Ajout_Utilisateur':
                    $this->control->adminTrueUser($_POST['id']);
                    break;
                case 'supprimer_utilisateur':
                    $this->control->adminUserFalse($_POST['id']);
                    break;
                case 'deconnexion':
                    $this->control->logOut($_POST['deco']);
                    break;
                case 'Validation_de_commentaire':
                    $this->control->adminTrueCommentary($_POST['id']);
                    break;
                case 'Administration':
                    $this->control->admin($this->bool);
                    break;
                case 'Refuser_Commentaire':
                    $this->control->deleteCommentary($_POST['id']);
                    break;
                case 'enregistrement_bon':
                    $this->registerGood();
                    break;
            }
            if (isset($_POST['submit_form'])) {
                $this->contact();
            }
        } else {
            $_GET['route'] = 'Accueil';
            $this->homeFunction();
        }
    }
}

