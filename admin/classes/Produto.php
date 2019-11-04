<?php

class Produto {
    private $id;
    private $produto;
    private $mes;
    private $descricao;
    private $imagem;
    
    function getId() {
        return $this->id;
    }

    function getProduto() {
        return $this->produto;
    }

    function getMes() {
        return $this->mes;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }


}