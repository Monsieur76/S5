<?php
class Database
{
    private static $db = NULL;
    private function __construct () {}
    private function __clone () {}
    public static function get()
    {
        if (!(self::$db instanceof self))
        {
            try
            {
                self::$db = new PDO('mysql:host=localhost;dbname=soutenance;charset=UTF8','root','', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
            }
            catch (PDOException $e)
            {
                echo 'Échec de la connexion : ' . $e->getMessage();
                exit;
            }        
        }
        return self::$db;
    }    
}
