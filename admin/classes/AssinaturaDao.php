<?php

class AssinaturaDao extends Db implements InterfaceDao {

    private $table = 'assinatura';

    public function insert($assinatura) {
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (idcliente, cartao, diavenc, mesvenc, codigo, endereco, cep) VALUES (:idcliente, :cartao, :diavenc, :mesvenc, :codigo, :endereco, :cep)");

        $stmt->bindValue(':idcliente', $assinatura->getIdcliente());
        $stmt->bindValue(':cartao', $assinatura->getCartao());
        $stmt->bindValue(':diavenc', $assinatura->getDiavenc());
        $stmt->bindValue(':mesvenc', $assinatura->getMesvenc());
        $stmt->bindValue(':codigo', $assinatura->getCodigo());
        $stmt->bindValue(':endereco', $assinatura->getEndereco());
        $stmt->bindValue(':cep', $assinatura->getCep());

        return $stmt->execute();
    }
    
    public function update($assinatura) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET idcliente=:idcliente, cartao=:cartao, diavenc=:diavenc, mesvenc=:mesvenc, codigo=:codigo, endereco=:endereco, cep=:cep WHERE id = :id;");

        $stmt->bindValue(':id', $assinatura->getId());
        $stmt->bindValue(':idcliente', $assinatura->getIdcliente());
        $stmt->bindValue(':cartao', $assinatura->getCartao());
        $stmt->bindValue(':diavenc', $assinatura->getDiavenc());
        $stmt->bindValue(':mesvenc', $assinatura->getMesvenc());
        $stmt->bindValue(':codigo', $assinatura->getCodigo());
        $stmt->bindValue(':endereco', $assinatura->getEndereco());
        $stmt->bindValue(':cep', $assinatura->getCep());

        return $stmt->execute();
    }    

    public function delete($assinatura) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE id = :id");

        $stmt->bindValue(':id', $assinatura->getId());
        
        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT $this->table.*, cliente.nome as Idcliente FROM $this->table INNER JOIN cliente ON $this->table.Idcliente = cliente.id");
        $stmt->execute();

        $assinaturas = array();

        while ($linha = $stmt->fetch()) {
            $assinatura = new Assinatura();
            $assinatura->setIdcliente($linha['idcliente']);
            $assinatura->setCartao($linha['cartao']);
            $assinatura->setDiavenc($linha['diavenc']);
            $assinatura->setMesvenc($linha['mesvenc']);
            $assinatura->setCodigo($linha['codigo']);
            $assinatura->setEndereco($linha['endereco']);
            $assinatura->setCep($linha['cep']);
            $assinatura->setId($linha['id']);

            $assinaturas[] = $assinatura;
        }
        return $assinaturas;
    }

    public function selectById($assinatura) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE id = :id");
        
        $stmt->bindValue(':id', $assinatura->getId());
        $stmt->execute();
        
        $linha = $stmt->fetch();

        $assinatura = new Assinatura();
        $assinatura->setIdcliente($linha['idcliente']);
        $assinatura->setCartao($linha['cartao']);
        $assinatura->setDiavenc($linha['diavenc']);
        $assinatura->setMesvenc($linha['mesvenc']);
        $assinatura->setCodigo($linha['codigo']);
        $assinatura->setEndereco($linha['endereco']);
        $assinatura->setCep($linha['cep']);
        $assinatura->setId($linha['id']);
        
        return $assinatura;
    }
}
