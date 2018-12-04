<?php

class eventCategory {

    public $id = 0;
    public $eventCategory = '';

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
        public function getEventCategoryList() {
            $results = array();
            $result = $this->db->query('SELECT `id`, `eventCategory` FROM `ye27d_eventsCategory`');
            if (is_object($result)) {
                $result = $result->fetchAll(PDO::FETCH_OBJ);
            }
            return $result;
        }
    
} // Accolade de fin classe eventCategory