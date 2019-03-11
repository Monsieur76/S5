<?php

namespace App\src\Model;
class View
{
    private $myConfig;
    private $file;
    private $title;
    private $template;
    private $php;
    private $home;

    public function render($template, $data = [])
    {
        $this->myConfig = parse_ini_file("config.ini", true);
        $this->template = $this->myConfig['Section2']['template'];
        $this->php = $this->myConfig['Section2']['extension'];
        $this->home = $this->myConfig['Section2']['nameFile'];
        $this->file = $this->template . $template . $this->php;
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile($this->template . $this->home . $this->php, [
            'title' => $this->title,
            'content' => $content,
        ]);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            echo 'Fichier inexistant';
        }
    }
}