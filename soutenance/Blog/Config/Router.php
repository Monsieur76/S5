<?php

namespace App\Config;

use App\src\Controller\BackController;
use App\src\Controller\Frontcontroller;
use App\src\Model\Form;

class Router
{
    private $front;
    private $control;
    private $route;

    function __construct()
    {
        $this->route = $_GET['route'];
        $this->front = new Frontcontroller;
        $this->control = new BackController;
    }

    public function run()
    {
        if (isset($this->route)) {
            if ($this->route === 'enregistrement') {
                $this->front->registration();
            } elseif ($this->route === 'Accueil') {
                $this->front->home();
            } elseif ($this->route === 'liste_des_postes') {
                $this->front->displayPost();
            } elseif ($this->route === 'Connexion') {
                $this->front->connect();
            } elseif ($this->route === 'afficher_Post') {
                $this->front->displayPostList($_POST['id_post_select_display']);
            } elseif ($this->route === 'Valid_confirmation') {
                $this->control->deleteConfirm($_POST['id']);
            } elseif ($this->route === 'confirm_commentary') {
                if (!empty($_POST['com']) && !empty($_POST['name'])) {
                    $id_post = intval($_POST['id']);
                    $id = strip_tags(htmlspecialchars($id_post));
                    $name = strip_tags(htmlspecialchars($_POST['name']));
                    $com = strip_tags(htmlspecialchars($_POST['com']));
                    $this->front->addConfirmCommentary($id, $com, $name);
                } else {
                    $this->front->erreurRegister();
                }
            } elseif ($this->route === 'connexion_accomplie') {
                if (isset($_POST['submit_connect'])) {
                    if (!empty($_POST['name_connect']) && !empty($_POST['password_connect'])) {
                        $this->control->controllerEmptyConnect($_POST['name_connect'],
                            $_POST['password_connect']);
                    } else {
                        $this->front->erreurRegister();
                    }
                }
            } elseif ($this->route === 'confirmation_update') {
                if (!empty($_POST['title']) & !empty($_POST['chapo'])
                    & !empty($_POST['author']) & !empty($_POST['contained'])) {
                    $this->front->confirmUpdate($_POST['chapo'], $_POST['title'], $_POST['contained'],
                        $_POST['author'], $_POST['id_update_post']);
                } else {
                    $this->front->emptyCaractere();
                }
            } elseif ($this->route === 'Annuler') {
                $this->front->false();
            } elseif ($this->route === 'confirm_ajout_post') {
                if (!empty($_POST['title']) & !empty($_POST['chapo'])
                    & !empty($_POST['author']) & !empty($_POST['contained'])) {
                    $chapo = strip_tags($_POST['chapo']);
                    $titlle = strip_tags($_POST['title']);
                    $contained = strip_tags($_POST['contained']);
                    $author = strip_tags($_POST['author']);
                    $this->front->addPostConfirmationTrue($titlle,
                        $chapo, $author, $contained);
                } else {
                    $this->front->emptyCaractere();
                }
            } elseif ($this->route === 'confirm_update_post') {
                if (!empty($_POST['title']) & !empty($_POST['chapo'])
                    & !empty($_POST['author']) & !empty($_POST['contained'])) {
                    $this->front->htmlTitleChapo($_POST['title'], $_POST['chapo'],
                        $_POST['author'], $_POST['contained'], $_POST['id_post']);
                } else {
                    $this->front->emptyCaractere();
                }
            } elseif ($this->route === 'ajouterUtilisateurConfirmation') {
                $this->control->adminTrueUser($_POST['id']);
            } elseif ($this->route === 'supprimer-utilisateur') {
                $this->control->adminUserTrue($_POST['id']);
            } elseif ($this->route === 'valid_commentary') {
                $this->front->controlConfirmCommentary($_POST['id_commentary']);
            } elseif ($this->route === 'deconnexion') {
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
                    $this->front->emptyCaractere();
                }
            } elseif ($this->route === 'valid_commentary_true') {
                $this->control->adminTrueCommentary($_POST['id']);
            } elseif ($this->route === 'Administration') {
                $this->control->admin();
            } elseif ($this->route === 'refus_commentary_true') {
                $this->control->deleteCommentary($_POST['id']);
            } elseif ($this->route === 'enregistrement_bon') {
                if (isset($_POST['submit_register']) & !empty($_POST['mail']) &
                    !empty($_POST['name']) & !empty($_POST['pass_register']) & preg_match
                    ("#[a-zA-Z0-9-]@[a-zA-Z0-9-].+[a-zA-Z0-9-]#", $_POST['mail'])) {
                    $this->front->controllerEmptyRegister($_POST['name'],
                        $_POST['pass_register'], $_POST['mail']);
                } else {
                    $this->front->erreurRegister();
                }
            } else {
                $this->front->erreurRegister();
            }
        } else {
            $this->front->home();
        }
    }
}

