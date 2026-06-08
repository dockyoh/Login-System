<?php

class LoginModel extends DbConnector
{

    public function logEmail($email)
    {
        try {
            $query = "SELECT COUNT(*) FROM users WHERE email = :email";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':email', $email);

            $statement->execute();

            $count = $statement->fetchColumn();

            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die('FAILED TO FETCH USER EMAIL! ' . $e->getMessage());
        }
    }

    public function logPassword($email, $password)
    {
        try {
            $query = "SELECT * FROM users WHERE email = :email";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':email', $email);

            $statement->execute();

            $results = $statement->fetchAll();

            $resultPassword = null;

            foreach ($results as $result) {
                if (password_verify($password, $result['pwd'])) {
                    $resultPassword = true;
                } else {
                    $resultPassword = false;
                }
            }

            return $resultPassword;
        } catch (PDOException $e) {
            die('FAILED TO FETCH USER PASSWORD! ' . $e->getMessage());
        }
    }
}
