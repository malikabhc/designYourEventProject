<?php

class eventType {

    public $id = '';
    public $eventType = '';

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }
    
    /**
     * Méthode permettant de récuperer tous les élements de la table
     * @return type
     */
        public function getEventTypeList() {
            $result = array();
            $result = $this->db->query('SELECT `id`, `eventType` FROM `ye27d_eventsType`');
            if (is_object($result)) {
                $result = $result->fetchAll(PDO::FETCH_OBJ);
            }
            return $result;
        }
    
} // Accolade de fin classe eventCategory