<?php

class ProductModel extends DbConnector
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

    public function getProduct()
    {
        try {
            $query = "SELECT * FROM products";

            $statement = $this->connect()->prepare($query);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        } catch (PDOException $e) {
            die('FAILED TO GET PRODUCT ' . $e->getMessage());
        }
    }

    public function deleteProduct($productId)
    {
        try {
            $query = "DELETE FROM products WHERE product_id = :productId";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':productId', $productId);

            $statement->execute();
        } catch (PDOException $e) {
            die('FAILED TO DELETE PRODUCT! ' . $e->getMessage());
        }
    }

    public function updateProduct() {}
}
