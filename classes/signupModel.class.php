<?php

class SignupModel extends DbConnector
{

    public function insertData($username, $pwd, $email)
    {
        try {
            $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

            $statement = $this->connect()->prepare($query);

            $loading = [
                'loading' => 15
            ];

            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $loading);

            $statement->bindParam(':username', $username);
            $statement->bindParam(':pwd', $hashedPwd);
            $statement->bindParam(':email', $email);

            $statement->execute();
        } catch (PDOException $e) {
            die('FAILED TO INSERT DATA ' . $e->getMessage());
        }
    }
}
