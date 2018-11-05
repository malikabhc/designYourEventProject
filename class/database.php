<?php
/**
 * Classe permettant de se connecter à la base de données MYSQL
 */
class database {

    protected $db;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';

    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }

    /**
     * Méthode permettant de créer l'instance PDO
     */
    protected function dbConnect() {
        // On teste les erreurs avec le try/catch, si tout est bon, on est connecté à la base de données
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=UTF8;', $this->login, $this->password);
        } // Autrement, un message d'erreur est affiché
        catch (Exception $ex) {
            $ex->getMessage();
        }
    }

}
