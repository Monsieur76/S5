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

    public function __construct()
    {
        $this->myConfig = parse_ini_file("config.ini", true);
    }

    public function config($config)
    {
        return $this->myConfig['View']["$config"];
    }

    public function render($template, $data = [])
    {
        $this->template = $this->config('template');
        $this->php = $this->config('extension');
        $this->home = $this->config('nameFile');
        $this->menu = $this->config('menu');
        $this->footer = $this->config('footer');
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