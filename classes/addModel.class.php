<?php

class AddModel extends DbConnector
{

    public function insertProduct($productName, $price, $quantity)
    {
        try {
            $query = "INSERT INTO products (product_name, price, stock_quantity) VALUES (:productName, :price, :stockQuantity);";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':productName', $productName);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':stockQuantity', $quantity);

            $statement->execute();
        } catch (PDOException $e) {
            die('FAILED TO INSERT PRODUCT! ' . $e->getMessage());
        }
    }
}
