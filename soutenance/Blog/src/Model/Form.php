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

        if (isset($_POST['submit_form']) & filter_var($sender, FILTER_VALIDATE_EMAIL)) {
            $this->myConfig = parse_ini_file("config.ini", true);
            $this->recipient = $this->myConfig['SendMail']['mailSend'];
            extract($_POST);
            if (mail($this->recipient, $name, $contained, $sender)) {
                $bool = true;
                return $this->front->home($bool);
            } else {
                $bool = 1;
                $this->front->home($bool);
            }
        }
    }
}
