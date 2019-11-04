<?php

class ClienteDao extends Db implements InterfaceDao {

    private $table = 'cliente';

    public function insert($cliente) {
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (nome, senha, email, telefone) VALUES (:nome, :senha, :email, :telefone)");

        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':telefone', $cliente->getTelefone());

        return $stmt->execute();
    }
    
    public function update($cliente) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET nome=:nome, senha = :senha, email = :email, telefone = :telefone WHERE id = :id;");

        $stmt->bindValue(':id', $cliente->getId());
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':telefone', $cliente->getTelefone());

        return $stmt->execute();
    }    

    public function delete($cliente) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE id = :id");

        $stmt->bindValue(':id', $cliente->getId());
        
        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $clientes = array();

        while ($linha = $stmt->fetch()) {
            $cliente = new Cliente();
            $cliente->setNome($linha['nome']);
            $cliente->setSenha($linha['senha']);
            $cliente->setEmail($linha['email']);
            $cliente->setTelefone($linha['telefone']);
            $cliente->setId($linha['id']);

            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public function selectById($cliente) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE id = :id");
        
        $stmt->bindValue(':id', $cliente->getId());
        $stmt->execute();
        
        $linha = $stmt->fetch();

        $cliente = new Cliente();
        $cliente->setNome($linha['nome']);
        $cliente->setSenha($linha['senha']);
        $cliente->setEmail($linha['email']);
        $cliente->setTelefone($linha['telefone']);
        $cliente->setId($linha['id']);
        
        return $cliente;
    }
}
