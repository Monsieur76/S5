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

    public function routeView($route)
    {
        return ($_GET['route'] === $route);
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

    public function submitContact()
    {
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $first = strip_tags(htmlspecialchars($_POST['first_name']));
        $object = [$name, $first];
        $message = strip_tags(htmlspecialchars($_POST['message']));
        $sender = strip_tags(htmlspecialchars($_POST['mail']));
        $this->front->contact($object, $message, $sender);
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
            $this->submitContact();
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
            if ($this->routeView('Enregistrement')) {
                 $this->front->registration();
            } elseif ($this->routeView('Accueil')) {
                 $this->homeFunction();
            } elseif ($this->routeView('liste_des_Articles')) {
                 $this->front->displayPost();
            } elseif ($this->routeView('Connexion')) {
                 $this->front->connect();
            } elseif ($this->routeView('Afficher_un_Article')) {
                 $this->front->displayPostList($_POST['id']);
            } elseif ($this->routeView('Validation_de_Suppression')) {
                 $this->control->deleteConfirm($_POST['id']);
            } elseif ($this->routeView('Validation_de_Commentaire')) {
                 $this->validCommentary();
            } elseif ($this->routeView('connexion_accomplie')) {
                 $this->good();
            } elseif ($this->routeView('Confirmation_Ajout_Article')) {
                 $this->confirmAddPost();
            } elseif ($this->routeView('confirmation_modification_article')) {
                 $this->confirmUpdatePost();
            } elseif ($this->routeView('Confirmation_Ajout_Utilisateur')) {
                 $this->control->adminTrueUser($_POST['id']);
            } elseif ($this->routeView('supprimer_utilisateur')) {
                 $this->control->adminUserFalse($_POST['id']);
            } elseif ($this->routeView('deconnexion')) {
                 $this->control->logOut($_POST['deco']);
            } elseif (isset($_POST['submit_form'])) {
                 $this->contact();
            } elseif ($this->routeView('Validation_de_commentaire')) {
                 $this->control->adminTrueCommentary($_POST['id']);
            } elseif ($this->routeView('Administration')) {
                 $this->control->admin($this->bool);
            } elseif ($this->routeView('Refuser_Commentaire')) {
                 $this->control->deleteCommentary($_POST['id']);
            } elseif ($this->routeView('enregistrement_bon')) {
                 $this->registerGood();
            } else {
                $_GET['route'] = 'Accueil';
                $this->homeFunction();
            }
        } else {
            $_GET['route'] = 'Accueil';
            $this->homeFunction();
        }
    }
}

