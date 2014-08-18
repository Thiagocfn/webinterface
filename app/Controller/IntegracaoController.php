<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
App::uses("File", "Utility");

/**
 * CakePHP Integracao
 * @author thiago
 */
class IntegracaoController extends AppController
{

    public $layout = "blank";

    public function index()
    {
        $this->layout = "default";
    }

    public function roomlist()
    {
        $this->response->charset("iso-8859-1");
        $roomlist = new File(Configure::read("Integracoes.AppSistemas.RoomList.file"));
        
        if ($roomlist->exists()) {
            if ($roomlist->readable()) {
                //echo "<pre>";
                echo $roomlist->read();
                //echo "</pre>";
            } else {
                echo "error Não é possível abrir para leitura.";
            }
        } else {
            echo "error Arquivo não existe";
        }
    }

}
