<?php

class Compra {
    private $id;
    private $idcliente;
    private $cartao;
    private $diavenc;
    private $mesvenc;
    private $codigo;
    private $endereco;
    private $cep;
    
    function getId() {
        return $this->id;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getCartao() {
        return $this->cartao;
    }

    function getDiavenc() {
        return $this->diavenc;
    }

    function getMesvenc() {
        return $this->mesvenc;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCep() {
        return $this->cep;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setCartao($cartao) {
        $this->cartao = $cartao;
    }

    function setDiavenc($diavenc) {
        $this->diavenc = $diavenc;
    }

    function setMesvenc($mesvenc) {
        $this->mesvenc = $mesvenc;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }
}