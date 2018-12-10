<?php

class users {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '';
    public $mail = '';
    public $password = '';
    public $idCity = 0;

    /**
     * Méthode magique __construct
     */
    public function __construct() {
        $database = databaseSingleton::getInstance();
        $this->db = $database->db;
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur
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
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`, `mail`, `password`, `firstname` FROM `ye27d_users` '
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
                $this->mail = $selectResult->mail;
                $this->password = $selectResult->password;
                $this->firstname = $selectResult->firstname;
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode permettant de vérifier si l'utilisateur existe déjà avant de le créer
     */
    public function checkIfUserExist() {
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `ye27d_users` '
                . 'WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }

    /**
     * Méthode qui permet à l'utilisateur d'afficher ses données
     */
    public function displayUserInformations() {
        $query = 'SELECT `ye27d_users`.`id`, `ye27d_users`.`lastname`, `ye27d_users`.`firstname`, `ye27d_users`.`birthdate`, `ye27d_users`.`mail`, `ye27d_city`.`cityName`, `ye27d_city`.`postalCode`  '
                . 'FROM `ye27d_users` '
                . 'INNER JOIN `ye27d_city` '
                . 'ON `ye27d_users`.`idCity` = `ye27d_city`.`id` '
                . 'WHERE `ye27d_users`.`id` = :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->execute();
        // Si $result est un objet on fait un fetch pour afficher les données de l'utilisateur
        if (is_object($result)) {
            $objectResult = $result->fetch(PDO::FETCH_OBJ);
        }
        return $objectResult;
    }

    /**
     * Méthode qui permet à l'utilisateur de modifier ses données
     */
    public function updateUserInformations() {
        $query = 'UPDATE `ye27d_users` '
                . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `mail` = :mail, `idCity` = :cityName '
                . 'WHERE `id` = :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':cityName', $this->idCity, PDO::PARAM_INT);
        if (is_object($result)) {
            // Si $result est un objet, on éxécute la requête et on récupère le résultat dans la variable $objectResult
            $objectResult = $result->execute();
        }
        return $objectResult;
    }

    /**
     * Méthode qui permet à l'utilisateur de supprimer son compte
     */
    public function removeUser() {
        $query = 'DELETE FROM `ye27d_users` '
                . 'WHERE `id` = :id';
        $result = $this->db->prepare($query);
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $result->execute();
    }

} // Accolade de fin class users
