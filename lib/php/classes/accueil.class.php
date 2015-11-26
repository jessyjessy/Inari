<?php

class Accueil {
    private $_attributs = array();
    
    public function __construct($data) {
        //on communique chaque ligne du resultset
        $this->hydrate($data);
    }
    
    public function hydrate(array $data){
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }  
    
    public function __get($key) {
        if(isset($this->_attributs[$key])){
            return $this->_attributs[$key];
        }
    }
    
    public function __set($key, $value) {
        $this->_attributs[$key]=$value;
      // =  _attributs['nom']="Arthur";
    }
    
}
