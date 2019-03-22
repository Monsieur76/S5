<?php

namespace App\src\Model;

use App\src\Controller\FrontController;

class Contact
{
    private $front;
    private $view;
    private $myConfig;
    private $smtp;
    private $userName;
    private $pass;
    private $mailFrom;
    private $mailName;
    private $port;

    function __construct()
    {
        $this->view = new View;
        $this->front = new FrontController;
        $this->myConfig =  parse_ini_file("config.ini", true);
    }

    public function Send($object, $contained, $sender)
    {
        $this->smtp = $this->config('smtp');
        $this->port = $this->config( 'port');
        $this->userName = $this->config('userName');
        $this->pass = $this->config('pass');
        $this->mailFrom = $this->config('mailFrom');
        $this->mailName = $this->config('mailName');
        $transport = (new \Swift_SmtpTransport( "$this->smtp" , $this->port))
            ->setUsername("$this->userName")
            ->setPassword("$this->pass");
        if(filter_var($sender,FILTER_VALIDATE_EMAIL)){
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message('Un Email vien est arriver'))
            ->setFrom(["$this->mailFrom" => "$this->mailName"])
            ->setTo(["$sender" => "de $object[1] $object[0]"])
            ->setBody("$contained");
            $mailer->send($message);
            $bool = true ;
            return $this->view->render('index_view',['bool'=> $bool]);
        } else{
            $bool = false ;
            return $this->view->render('index_view',['bool'=> $bool]);
        }
    }
    public function config( $configIni )
    {
        return $this->myConfig ['SendMail'] ["$configIni"];
    }
}