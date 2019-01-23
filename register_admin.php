<?php
class Register
{
    public $name_register;
    public $password_register;
    public $mail_register;
    function register_new()
    {
        $db = Database::get();
        $name_register = strip_tags(htmlspecialchars($_POST['name']));
        $password_register = strip_tags(htmlspecialchars($_POST['pass_register']));
        $mail_register = strip_tags(htmlspecialchars($_POST['mail']));
        try{
        $data = $db->prepare('INSERT INTO admin (pseudo,pass,mail,register) VALUES (:pseudo,:pass,:mail,:register)') or die(print_r($database->errorInfo()));
        $data->execute(array(
            'pseudo' => $name_register,
            'pass' => $password_register,
            'mail' => $mail_register,
            'register' => 0,
        ));}
            catch (Exception $e)
        {
            $e->getMessage();
        }
    }
}
