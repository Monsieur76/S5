<?php
include ('database.php');
include ('postuser.php');
include ('token.php');
class Controller
{

    function __construct()
    {
        if (isset($_POST['submit_connect'])){
            $this -> controller_empty_connect();
        } 
        elseif (isset($_POST['submit_register'])){
            $this -> controller_empty_register();
        }
        elseif ($this->logout_requested()===true){
            session_unset();
            session_destroy();
        }
        elseif (isset($_POST['submit_connect'])){
            $this -> user_request();
        }
        elseif (isset($_POST['add_post']) || isset($_POST['update_post'])){
            $this ->control_empty_post();
        }
        elseif (isset($_POST['add_com'])){
            include ('add_commentary.php');
        }
        elseif (isset($_POST['update_commentary'])){
            include ('add_commentary.php');
            $commentary = new Commentary;
            $commentary->insert_com();
        }
    }
    function controller_empty_connect()
    {
        if (!empty($_POST['name_connect']) && !empty($_POST['password_connect'])) {
            require_once('connect.php');
            $new_connect=new Connect;
        }
    }
    function controller_empty_register()
    {
        if ( !empty($_POST['name'])&& !empty($_POST['pass_register'])&& !empty($_POST['mail'])){
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                require_once('register_admin.php');
                $new_register=new Register;
                $new_register->register_new();
            }
        }
    }     
    
    function is_user_connected()
    {
        return isset($_SESSION['pseudo']);
    }

    function logout_requested()
    {
        if (isset($_POST['deco'])){
            return true;
        }
        else{
            return false;
        }
    }
    function user_request()
    {
        if (isset($_POST['submit_connect'])){
            $this->controller_empty_connect();
        }
    }
    function new_user_admin_wait_valid()
    {
        require_once('Manage.php'); 
        $new_user=new Valid;
        $new_user->admin_wait();
    }
    function select_post_and_display()
    {
        $select_post=new Manage_Post;
        $select_post->post_select();
    }
    function html_title_chapo()
    {
        $title = strip_tags(htmlspecialchars($_POST['title']));
        $chapo = strip_tags(htmlspecialchars($_POST['chapo']));
        $contained = strip_tags(htmlspecialchars($_POST['contained']));
        $author = strip_tags(htmlspecialchars($_POST['author']));
        if (isset($_POST['add_post'])){
            $admin_user_post = new Post;
            $admin_user_post -> add_post($title,$chapo,$contained,$author);
        }
        else{
            $post = $_POST['id_update_post'];
            $user_post = new Post_User;  
            $user_post->update_user($title,$chapo,$contained,$author,$post); 
        }
    }
    function control_empty_post()
    {
        if (!empty($_POST['title'])&& !empty($_POST['chapo']) && !empty ($_POST['contained'])&& !empty($_POST['author'])){

            $this->html_title_chapo();
        }
    }
    function new_commentary()
    {
        include('Manage.php'); 
        $new_user=new Valid;
        $new_user->admin_valid_com();
    }
}
