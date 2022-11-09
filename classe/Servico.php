<?php

class Servico extends Bd{
    private $id_cliente;
    private $nome_cliente;
    private $status;
    private $parcelas;
    private $des_servico;
    private $valor;
    private $select;
    
    public function __construct($id_cliente = NULL,$status = NULL, $parcelas = NULL,$des_servico = NULL,$valor = NULL) {
        $this->id_cliente = $id_cliente;
        $this->status = $status;
        $this->parcelas = $parcelas;
        $this->des_servico = $des_servico;
        $this->valor = $valor;
    }
    
    public function getIdCliente(){
        return $this->id_cliente;
    }
    
    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function getParcelas(){
        return $this->status;
    }
    
    public function setParcelas($parcelas){
        $this->parcelas = $parcelas;
    }
    
    public function getDesServico(){
        return $this->des_servico;
    }
    
    public function setDesServico($des_servico){
        $this->des_servico = $des_servico;
    }
    
    public function  getValor(){
        return $this->valor;
    }
    
    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getSelect(){
        return $this->select;
    }
    
    public function setSelect($select){
        $this->select = $select;
    }
    
    
    public function selectServico($selecionado,$from = NULL,$id_cliente = NULL, $status = NULL, $orderby = NULL) {
        parent::select();
        $select = "SELECT $selecionado ";
        if($from != NULL){
            $select .= "FROM $from ";
        }else $select .= "FROM solicitacao_servico ";
        if($id_cliente != NULL){
            $select .= " WHERE $id_cliente ";
            if($status != NULL){
                $select .= "AND $status";
            }
        }if ($status != NULL) {
            $select .= "WHERE $status";
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
    public function selectNomeCliente($id_cliente) {
        parent::select();
        $select = "SELECT nome FROM";
    }
    
    public function insertServico($table) {
        parent::insert();
        $insert = mysqli_query($this->getCon(), "INSERT INTO $table(id_cliente,status,parcelas,des_servico,valor) 
            VALUES('$this->id_cliente','$this->status','$this->parcelas','$this->des_servico','$this->valor')");
        if($insert){
            return true;
        }else return false;
    }
    
    public function __toString() {
        return $this->select;
    }
}

?>
