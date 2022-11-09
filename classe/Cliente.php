<?php

class Cliente extends Pessoa{
    private $id_cliente;
    private $id_pessoa;
    private $obs;
    private $select;
    
    public function __construct($id_cliente = NULL, $id_pessoa = NULL,$obs = NULL) {
        $this->id_cliente = $id_cliente;
        $this->id_pessoa = $id_pessoa;
        $this->obs = $obs;
    }    
    
    public function getIdCliente(){
        return $this->id_cliente;
    }
    
    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    
    public function getIdPessoa(){
        return $this->id_pessoa;
    }
    
    public function setIdPessoa($id_pessoa){
        $this->id_pessoa = $id_pessoa;
    }
    
    public function getObs(){
        return $this->obs;
    }
    
    public function setObs($obs){
        $this->obs = $obs;
    }
    public function getSelect() {
        return $this->select;
    }
    
    public function selectCliente($select,$table,$where = NULL,$orderby = NULL) {
        $select = "SELECT $select FROM $table";
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

    public function insertCliente($table) {
        parent::insertPessoa($table);
        $insert = mysqli_query($this->getCon(), "INSERT INTO $table(id_cliente,id_pessoa,obs) 
            VALUES('$this->id_cliente','$this->id_pessoa','$this->obs')");
        if($insert){
            return true;
        }else return false;
    }
}

?>
