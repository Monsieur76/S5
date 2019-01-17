<?php 
class Connect
{
    public $name;
    public $password;
    function __construct()
    {
                $name=htmlspecialchars(($_POST['name_connect']));
                $password=htmlspecialchars(($_POST['password_connect']));
                $db = Database::get();
                $datab=$db->prepare('SELECT * FROM admin WHERE register=1');
                $data=$datab->execute();
                    while ($donne=$datab->fetch()){
                        if ($donne['pseudo']== $name && $donne['pass']==$password ){
                            $_SESSION['pseudo']=$name;
                        }
                        else{
                            
                        }
                    }
    }
}