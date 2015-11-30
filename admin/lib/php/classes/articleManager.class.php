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
 
 public function getCompte($login) {
        try {
            $query = "select * from client where login = '$login'";
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
    
     public function insererDansPanier($idarticle,$idclient,$quantite,$prix_unitaire,$nom) {
        try {
            $query = "insert into panier(id_article,id_client,quantite,prix_unitaire,nom) values($idarticle,$idclient,$quantite,'$prix_unitaire','$nom');";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        
    }
    
    public function supprimerDuPanier($id_panier) {
        try {
            $query = "delete from panier where id_panier=$id_panier";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        
    }
    
        public function conclureUneVente($idarticle,$idclient,$quantite,$prix_unitaire) {
        try {
            $query = "insert into vente(id_article,id_client,quantite,prix_unitaire,date_facturation) values($idarticle,$idclient,$quantite,'$prix_unitaire',current_date);";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        
    }
    
    
    
    public function getContenuPanier($id_client) {
        try {
            $query = "select * from panier where id_client = $id_client ";
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


}
