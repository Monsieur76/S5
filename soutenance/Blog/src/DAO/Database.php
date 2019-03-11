<?php
namespace App\src\DAO;
use mysql_xdevapi\Exception;
use PDO;
class Database
{
    private static $myConfig ;
    private static $db = NULL;
    private static $sql = 'mysql:host';
    private static $host;
    private static $dbn = 'dbname';
    public static $name;
    private static $charset = 'charset';
    private static $namecharset ;
    private static $username ;
    private static $pass ;
    private static $mode = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];
    public static function get()
    {
        self::$myConfig = parse_ini_file("config.ini", true);
        self::$name = self::$myConfig['Section1']['dbname'];
        self::$host = self::$myConfig['Section1']['host'];
        self::$namecharset = self::$myConfig['Section1']['charset'];
        self::$username = self::$myConfig['Section1']['username'];
        self::$pass = self::$myConfig['Section1']['pass'];
        if (!(self::$db instanceof self))
        {
            try
            {
                self::$db = new PDO(self::$sql.'='.self::$host.';'.self::$dbn.'='.self::$name.
                    ';'.self::$charset.'='.self::$namecharset,self::$username,self::$pass,
                    self::$mode);
            }
            catch (Exception $e)
            {
                echo 'Échec de la connexion : ' . $e->getMessage();
                exit;
            }        
        }
        return self::$db;
    }    
}