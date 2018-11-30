<?php

class themes {

    public $id = '';
    public $className = '';
    public $themeName = '';
    public $themeLink = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant de récuperer tous les élements de la table
     */
    public function getThemesList() {
        $result = array();
        $result = $this->db->query('SELECT `id`, `className`, `themeName`, `themeLink` FROM `ye27d_themes`');
        if (is_object($result)) {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

}

// Accolade de fin classe eventCategory