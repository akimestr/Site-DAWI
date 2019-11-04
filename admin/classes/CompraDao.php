<?php

class CompraDao extends Db implements InterfaceDao {

    private $table = 'compra';

    public function insert($compra) {
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (idcliente, cartao, diavenc, mesvenc, codigo, endereco, cep) VALUES (:idcliente, :cartao, :diavenc, :mesvenc, :codigo, :endereco, :cep)");

        $stmt->bindValue(':idcliente', $compra->getIdcliente());
        $stmt->bindValue(':cartao', $compra->getCartao());
        $stmt->bindValue(':diavenc', $compra->getDiavenc());
        $stmt->bindValue(':mesvenc', $compra->getMesvenc());
        $stmt->bindValue(':codigo', $compra->getCodigo());
        $stmt->bindValue(':endereco', $compra->getEndereco());
        $stmt->bindValue(':cep', $compra->getCep());

        return $stmt->execute();
    }
    
    public function update($compra) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET idcliente=:idcliente, cartao=:cartao, diavenc=:diavenc, mesvenc=:mesvenc, codigo=:codigo, endereco=:endereco, cep=:cep WHERE id = :id;");

        $stmt->bindValue(':id', $compra->getId());
        $stmt->bindValue(':idcliente', $compra->getIdcliente());
        $stmt->bindValue(':cartao', $compra->getCartao());
        $stmt->bindValue(':diavenc', $compra->getDiavenc());
        $stmt->bindValue(':mesvenc', $compra->getMesvenc());
        $stmt->bindValue(':codigo', $compra->getCodigo());
        $stmt->bindValue(':endereco', $compra->getEndereco());
        $stmt->bindValue(':cep', $compra->getCep());

        return $stmt->execute();
    }    

    public function delete($compra) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE id = :id");

        $stmt->bindValue(':id', $compra->getId());
        
        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT $this->table.*, cliente.nome as Idcliente FROM $this->table INNER JOIN cliente ON $this->table.Idcliente = cliente.id");
        $stmt->execute();

        $compras = array();

        while ($linha = $stmt->fetch()) {
            $compra = new Compra();
            $compra->setIdcliente($linha['idcliente']);
            $compra->setCartao($linha['cartao']);
            $compra->setDiavenc($linha['diavenc']);
            $compra->setMesvenc($linha['mesvenc']);
            $compra->setCodigo($linha['codigo']);
            $compra->setEndereco($linha['endereco']);
            $compra->setCep($linha['cep']);
            $compra->setId($linha['id']);

            $compras[] = $compra;
        }
        return $compras;
    }

    public function selectById($compra) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE id = :id");
        
        $stmt->bindValue(':id', $compra->getId());
        $stmt->execute();
        
        $linha = $stmt->fetch();

        $compra = new Compra();
        $compra->setIdcliente($linha['idcliente']);
        $compra->setCartao($linha['cartao']);
        $compra->setDiavenc($linha['diavenc']);
        $compra->setMesvenc($linha['mesvenc']);
        $compra->setCodigo($linha['codigo']);
        $compra->setEndereco($linha['endereco']);
        $compra->setCep($linha['cep']);
        $compra->setId($linha['id']);
        
        return $compra;
    }
}