<?php
class Bd {
    private $con = false;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'painel';
    
    
    public function getCon(){
        return $this->con;
    }
    
    public function connect(){
        if(!$this->con){
            $mycon = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
            if($mycon){
                $this->con = $mycon;
                return TRUE;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function select(){
        
    }
    
    public function insert(){
        
    }
    
}

?>
