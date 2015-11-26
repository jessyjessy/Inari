<?php

class ArticleManager extends Article {

    private $_db;
    private $_confortArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeArticles() {
        try {
            $query = "select * from stock order by description";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_confortArray[] = new Article($data);
        }

        return $_confortArray;
    }

    public function getListeTypes() {
        try {
            $query = "select * from type_article order by description_type_article";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_confortArray[] = new Article($data);
        }

        return $_confortArray;
    }
    
     public function getListeSousTypes($type){
        try {
            $query="select * from sous_type_article where type_article=$type  order by description";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
           
        }
    
        while($data = $resultset->fetch()){
            $_confortArray[] = new Article($data);
        }
        
        return $_confortArray;
 } 
 
    
 public function getListeTypesArticle($type){
        try {
            $query="select * from stock where id_sous_type_article in (select id_sous_type_article from sous_type_article where type_article=$type) order by nom_article";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
           
        }
    
        while($data = $resultset->fetch()){
            $_confortArray[] = new Article($data);
        }
        
        return $_confortArray;
 } 
 
 
 public function getListeSousTypesArticle($sousType){
        try {
            $query="select * from stock where id_sous_type_article=$sousType  order by description";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
           
        }
    
        while($data = $resultset->fetch()){
            $_confortArray[] = new Article($data);
        }
        
        return $_confortArray;
 }
 
 
 public function getListeRecherche($recherche){
        try {
            $query="select * from stock where nom_article like '%$recherche%' or description like '%$recherche%'";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
           
        }
    
        while($data = $resultset->fetch()){
            $_confortArray[] = new Article($data);
        }
        
        return $_confortArray;
 } 
 

}
