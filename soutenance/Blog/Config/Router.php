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

    public function run()
    {
        if (isset($_GET['route'])) {
            if ($_GET['route'] === 'Enregistrement') {
                $this->front->registration();
            } elseif ($_GET['route'] === 'Accueil') {
                $this->front->home($this->bool);
            } elseif ($_GET['route'] === 'liste_des_Articles') {
                $this->front->displayPost();
            } elseif ($_GET['route'] === 'Connexion') {
                $this->front->connect();
            } elseif ($_GET['route'] === 'Afficher_un_Article') {
                $this->front->displayPostList($_POST['id']);
            } elseif ($_GET['route'] === 'Validation_de_Suppression') {
                $this->control->deleteConfirm($_POST['id']);
            } elseif ($_GET['route'] === 'Validation_de_Commentaire') {
                if (!empty($_POST['com']) && !empty($_POST['name'])) {
                    $id_post = intval($_POST['id']);
                    $id = strip_tags(htmlspecialchars($id_post));
                    $name = strip_tags(htmlspecialchars($_POST['name']));
                    $com = strip_tags(htmlspecialchars($_POST['com']));
                    $this->front->addConfirmCommentary($id, $com, $name);
                } else {
                    $this->front->displayPostList($_POST['id']);
                }
            } elseif ($_GET['route'] === 'connexion_accomplie') {
                if (isset($_POST['submit_connect'])) {
                    if (!empty($_POST['name_connect']) && !empty($_POST['password_connect'])) {
                        $this->control->controllerEmptyConnect($_POST['name_connect'],
                            $_POST['password_connect']);
                    } else {
                        $this->front->errorRegister();
                    }
                }
            } elseif ($_GET['route'] === 'Confirmation_Ajout_Article') {
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
            } elseif ($_GET['route'] === 'confirmation_modification_article') {
                if (!empty($_POST['title']) & !empty($_POST['chapo'])
                    & !empty($_POST['author']) & !empty($_POST['contained'])) {
                    $this->control->htmlTitleChapo($_POST['title'], $_POST['chapo'],
                        $_POST['author'], $_POST['contained'], $_POST['id_post']);
                } else {
                    $this->control->admin($this->bool);
                }
            } elseif ($_GET['route'] === 'Confirmation_Ajout_Utilisateur') {
                $this->control->adminTrueUser($_POST['id']);
            } elseif ($_GET['route'] === 'supprimer_utilisateur') {
                $this->control->adminUserTrue($_POST['id']);
            } elseif ($_GET['route'] === 'deconnexion') {
                $this->control->logOut($_POST['deco']);
            } elseif (isset($_POST['submit_form'])) {
                if (!empty($_POST['first_name']) &&
                    !empty($_POST['mail']) && !empty($_POST['message'])) {
                    $form = new Form;
                    $objet = strip_tags(htmlspecialchars($_POST['name'] && $_POST['first_name']));
                    $message = strip_tags(htmlspecialchars($_POST['message']));
                    $sender = strip_tags(htmlspecialchars($_POST['mail']));
                    $form->Send($objet, $message, $sender);
                } else {
                    $this->front->home($this->bool);
                }
            } elseif ($_GET['route'] === 'Validation_de_commentaire') {
                $this->control->adminTrueCommentary($_POST['id']);
            } elseif ($_GET['route'] === 'Administration') {
                $this->control->admin($this->bool);
            } elseif ($_GET['route'] === 'Refuser_Commentaire') {
                $this->control->deleteCommentary($_POST['id']);
            } elseif ($_GET['route'] === 'enregistrement_bon') {
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
            else {
                $_GET['route'] = 'Accueil';
                $this->front->home($this->bool);
            }
        }
        else {
            $_GET['route'] = 'Accueil';
            $this->front->home($this->bool);
        }
    }
}

