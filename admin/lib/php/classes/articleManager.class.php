<?php

class ArticleManager extends Article {

    private $_db;
    private $_confortArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeArticles() {
        try {
            $query = "select id_article,nom_article, description_type_article, sous_type_article.description sous_type, quantite_en_stock, prix_vente, stock.description
from stock, type_article, sous_type_article
where stock.id_sous_type_article=sous_type_article.id_sous_type_article and
sous_type_article.type_article=type_article.id_type_article
order by description_type_article, sous_type_article.description, stock.nom_article";
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
    
    public function getListeArticles2() {
        try {
            $query = "select * from stock";
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
    
    public function supprimerDuPanier($id_client) {
        try {
            $query = "delete from panier where id_client=$id_client";
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

    public function getListePays() {
        try {
            $query = "select * from pays";
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
    
      public function ajouterClient($id_pays,$login,$mot_de_passe,$nom_client,$prenom_client,$rue,$numero,$cp,$localite,$mail,$sexe,$age) {
        try {
            $query = "select ajout_client($id_pays,'$login','$mot_de_passe','$nom_client','$prenom_client','$rue','$numero',$cp,'$localite','$mail','$sexe',$age)";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
    public function MAJclient($id_pays,$login,$mot_de_passe,$nom_client,$prenom_client,$rue,$numero,$cp,$localite,$mail,$sexe,$age,$id_client) {
        try {
            $query = "select MAJ_client($id_pays,'$login','$mot_de_passe','$nom_client','$prenom_client','$rue','$numero',$cp,'$localite','$mail','$sexe',$age,$id_client)";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
     public function supprimerClient($id_client) {
        try {
            $query = "select supprimer_client($id_client)";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
     public function getTopClient() {
        try {
            $query = "select * from client order by total_achat desc";
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
    
       public function getTotalVente() {
        try {
            $query = "select * from total_vente";
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
    
  
    
     public function Prix_total_panier() {
        try {
            $query = "UPDATE panier SET prix_total=prix_unitaire*quantite";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
     public function Prix_total_vente() {
        try {
            $query = "UPDATE vente SET prix_total=prix_unitaire*quantite";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
   
      public function Actualiser_total_client() {
        try {
            $query = "update client set total_achat=total_somme.sum from total_somme where client.id_client=total_somme.id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
      public function Actualiser_le_stock($id_article, $en_moins) {
        try {
            $query = "update stock set quantite_en_stock=quantite_en_stock-$en_moins where id_article=$id_article";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

    }
    
     public function getProduitsLesMieuxVendus() {
        try {
            $query = "select * from produits_les_mieux_vendus";
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
    
    public function getBenefices() {
        try {
            $query = "select nom_article, sum((prix_vente-prix_achat)*vente.quantite) benefice from stock, vente where stock.id_article=vente.id_article group by nom_article order by benefice desc";
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
    
     public function getListeFournisseur() {
        try {
            $query = "select * from fournisseur order by nom_fournisseur";
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
    
     public function getListeSousType() {
        try {
            $query = "select * from sous_type_article order by description";
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
