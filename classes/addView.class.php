<?php

session_start();

class AddView
{

    public function showAddErros()
    {
        if (isset($_SESSION['addErrors'])) {
            $errors = $_SESSION['addErrors'];

            foreach ($errors as $error) {
                echo htmlspecialchars($error) . '</br>';
            }
        }
        unset($_SESSION['addErrors']);
    }
}
