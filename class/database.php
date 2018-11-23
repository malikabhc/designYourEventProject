<?php

/**
 * Classe permettant de se connecter à la base de données MYSQL
 */
class databaseSingleton {

    public $db;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';
    private static $_instance;

    protected function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;

// On teste les erreurs avec le try/catch, si tout est bon, on est connecté à la base de données
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=UTF8;', $this->login, $this->password);
        } // Autrement, un message d'erreur est affiché
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

/**
 * Méthode getInstance
 */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

}
