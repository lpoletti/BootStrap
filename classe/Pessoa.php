<?php

class Pessoa extends Bd{
    private $nome;
    private $telefone;
    private $celular;
    private $endereco;
    private $cep;
    private $cidade;
    private $estado;
    private $select;
    
    public function __construct($nome = NULL,$telefone = NULL, $celular = NULL,$endereco = NULL, $cep = NULL, $cidade = NULL, $estado = NULL) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->endereco = $endereco;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    public function getCelular(){
        return $this->celular;
    }
    
    public function setCelular($celular){
        $this->celular = $celular;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getCep(){
        return $this->cep;
    }
    
    public function setCep($cep){
        $this->cep = $cep;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getEstado(){
        return $this->estado;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function getSelect(){
        return $this->select;
    }
    
    public function setSelect($select){
        $this->select = $select;
    }
    
    
    public function selectPessoa($table, $where = NULL, $orderby = NULL) {
        parent::select();
        $select = "SELECT * FROM $table";
        if($where != NULL){
            $select .= " WHERE $where";
        }if ($orderby != NULL) {
            $select .= " ORDER BY $orderby";
         }
         $query = mysqli_query(parent::getCon(), $select);
         if($query){
             $this->select = $query;
            return TRUE;
         }else{
             return false;
         }
    }
    
    public function insertPessoa($table) {
        parent::insert();
        $insert = mysqli_query($this->getCon(), "INSERT INTO $table(nome,telefone,celular,endereco,cep,cidade,estado) 
            VALUES('$this->nome','$this->telefone','$this->celular','$this->endereco','$this->cep','$this->cidade','$this->estado')");
        if($insert){
            return true;
        }else return false;
    }
    
    public function __toString() {
        echo "INSERTO INTO pessoa(nome,telefone,celular,endereco,cep,cidade,estado) VALUES('$this->nome','$this->telefone','$this->celular','$this->endereco','$this->cep','$this->cidade','$this->estado')";
    }
}

?>
