<?php 

class Form_Class
{
        function __construct()
        {
                if (isset($_POST)&& !empty($_POST['first_name'])&& !empty($_POST['mail'])&& !empty($_POST['message']))
                    {
                        $objet= strip_tags(htmlspecialchars($_POST['name']&& $_POST['first_name']));
                        $message=strip_tags(htmlspecialchars($_POST['message']));
                        $sender=strip_tags(htmlspecialchars($_POST['mail']));

                        $recipient='gaetanhenry76@gmail.com';
                        extract($_POST);
                        mail($recipient,$objet,$message,$sender);
                        echo 'Message envoyer avec succes';
                    }
        }
}
if (isset($_POST['submit_form']))
{
    $form = new Form_Class;
}                   ?>