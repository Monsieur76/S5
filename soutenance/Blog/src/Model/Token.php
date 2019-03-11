<?php
namespace App\src\Model;
class Token
{
    public function token ()
    {
        $mincarac = str_shuffle('azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBNé');
        $token = '';
        srand((double)microtime() * 1000000);
        for ($i = 0; $i < 20; $i++) {
            $token .= $mincarac[rand() % strlen($mincarac)];
        }
        $token = utf8_encode($token);
    }
}