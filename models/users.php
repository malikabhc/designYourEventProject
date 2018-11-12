<?php

class users extends database {

    public $id = '';
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $mail = '';
    public $password = '';
    public $idCity = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * @return boolean
     */
    public function userRegister() {
        $query = 'INSERT INTO `ye27d_users` (`lastname`, `firstname`, `birthdate`, `mail`, `password`, `idCity`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :mail, :password, :cityName)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':cityName', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`, `mail`, `password` FROM `ye27d_users` '
                . 'WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) { 
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) { 
                // On hydrate
                $this->id = $selectResult->id;
                $this->lastname = $selectResult->mail;
                $this->password = $selectResult->password;
                $state = true;
            }
        }
        return $state;
    }
    
    /**
     * Méthode permettant de vérifier si l'utilisateur existe déjà avant de le créer
     */
//    public function checkIfUserExist(){
//        $state = false;
//        $query = 'SELECT COUNT(`id`) AS `count` FROM `ye27d_users` WHERE `mail` = :mail';
//        $result = $this->db->prepare($query);
//        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
//        if ($result->execute()) {
//            $selectResult = $result->fetch(PDO::FETCH_OBJ);
//            $state = $selectResult->count;
//        }
//        return $state;
//    }
}
