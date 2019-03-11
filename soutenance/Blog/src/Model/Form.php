<?php

namespace App\src\Model;

use App\src\Controller\FrontController;
use \Exception;

class Form
{
    private $myConfig;
    private $recipient;
    private $front;
    private $view;

    public function Send($name, $contained, $sender)
    {
        $this->view = new View;
        $this->front = new FrontController;
        try {
            if (isset($_POST['submit_form'])) {
                $this->myConfig = parse_ini_file("config.ini", true);
                $this->recipient = $this->myConfig['SendMail']['mailSend'];
                extract($_POST);
                if (filter_var($sender, FILTER_VALIDATE_EMAIL)) {
                    try {
                        mail($this->recipient, $name, $contained, $sender);
                        $this->front->adminUserTrue();
                    } catch (Exception $e) {
                        return $this->front->adminUserTrue();
                    }
                } else {
                    $this->view->render('false_mail');
                }
            }
        } catch (Exception $e) {
            $this->front->emptyCaractere();
        }
    }
}
