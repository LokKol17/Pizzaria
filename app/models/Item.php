<?php

class Item {
    private $id;
    private $nome;
    private $descricao;
    private $ingredientes;

    public function __construct($id, $nome, $descricao, $ingredientes) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->ingredientes = $ingredientes;
    }


    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

}