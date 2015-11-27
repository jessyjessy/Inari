<?php

class CompteManager extends Article {

    private $_db;
    private $_compteArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getCompte($login) {
        try {
            $query = "select * from client where login = $login";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_compteArray[] = new Compte($data);
        }

        return $_compteArray;
    }
}