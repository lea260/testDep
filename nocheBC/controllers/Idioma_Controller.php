<?php

class Idioma_Controller extends Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->view->mensaje = "";
    }

    //http://localhost/tardeBC/idioma
    public function render()
    {
        $this->view->render('idioma/index');
    }

    public function cambiarIdioma()
    {
        $idioma = $_POST['idioma'] ?? "es";
        setcookie("idioma", $idioma, time() + 60 * 60 * 24, "/");
        //var_dump($_POST);
        $this->view->idioma = $idioma;
        $this->view->render('idioma/cambiarIdioma');
    }

}