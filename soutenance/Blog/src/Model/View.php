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
    private $menu;
    private $footer;

    public function render($template, $data = [])
    {
        $this->myConfig = parse_ini_file("config.ini", true);
        $this->template = $this->myConfig['View']['template'];
        $this->php = $this->myConfig['View']['extension'];
        $this->home = $this->myConfig['View']['nameFile'];
        $this->menu = $this->myConfig['View']['menu'];
        $this->footer = $this->myConfig['View']['footer'];
        $this->file = $this->template . $template . $this->php;
        $this->footer = $this->template . $this->footer . $this->php;
        $this->menu = $this->template . $this->menu . $this->php;
        $menu = $this->renderFile($this->menu, $data);
        $footer = $this->renderFile($this->footer, $data);
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile($this->template . $this->home . $this->php, [
            'title' => $this->title,
            'content' => $content,
            'footer' => $footer,
            'menu' => $menu,
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