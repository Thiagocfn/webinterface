<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');
App::uses("File", "Utility");

/**
 * CakePHP ConfigController
 * @author thiago
 */
class ConfigController extends AppController
{

    public $components = array(
        'Session'
    );

    public function index()
    {
        $file = new File(APP . "Config" . DS . "integracoes.php");
        $conteudo = "";
        if ($file->exists()) {
            $conteudo = htmlentities($file->read());
        }

        if ($this->request->is("POST")) {
            $arquivo = '<?php
Configure::write("Integracoes.AppSistemas", array(
    "RoomList" => array (
        "file" => "' . $this->request->data["Integracoes"]["AppSistemas"]["RoomList"]["file"] . '"
    )
));';
            $conteudo = htmlentities($arquivo);
            if($file->writable()){
            $file->write($arquivo, 'w', true);
            $this->Session->setFlash("Dados atualizados com sucesso!");
            }
            else {
                $this->Session->setFlash("Não há permissão para sobrescrever arquivo ". $file->path);
            }
        } else {
            $this->request->data["Integracoes"] = Configure::read("Integracoes");
        }
        $this->set("conteudo", $conteudo);
    }

}
