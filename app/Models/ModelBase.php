<?php

namespace App\Models;

use System\Core\Classes\Database;

class ModelBase 
{
    // tabela do banco de dados ao qual o model está relacionado
    protected $tabela;
    // instancia do banco de dados
    protected $db;

    /**
    * Cria uma instancia do banco de dados que será utilizada nas consultas
    * @author Brunoggdev
    */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
    * Atalho para interagir com o método select do query builder
    * @author Brunoggdev
    */
    public function select(array $colunas = ['*']):Database
    {
        return $this->db->select($this->tabela, $colunas);
    }


    /**
    * Atalho para interagir com o método insert do query builder
    * @author Brunoggdev
    */
    public function insert(array $params):bool
    {
        return $this->db->insert($this->tabela, $params);
    }


    /**
    * Atalho para interagir com o método update do query builder
    * e editar um único id
    * @author Brunoggdev
    */
    public function update(int|string $id, array $params):bool
    {
        return $this->db->update($this->tabela, $params, ['id' => $id]);
    }


    /**
    * Atalho para interagir com o método delete do query builder
    * e deletar um único id
    * @author Brunoggdev
    */
    public function delete(int|string $id)
    {
        return $this->db->delete($this->tabela, ['id' => $id]);
    }



    /**
    * Retorna uma instancia da classe Database.
    * @author Brunoggdev
    */
    public function db():Database
    {
        return $this->db;
    }



    /**
    * Retorna os erros que ocorreram durante a execução da SQL
    * @author Brunoggdev
    */
    public function erros():array
    {
        return $this->db->erros();
    }
}