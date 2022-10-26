<?php

namespace Models\User;

use Models\Database;

class UserManager extends Database
{
    public function register($firstname, $lastname, $email, $password)
    {
        $req = "INSERT INTO user  VALUES (:firstname,:lastname,:email,:password )";
        $statement = $this->getBdd()->prepare($req);

        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);

        $statement->execute();
    }
}
