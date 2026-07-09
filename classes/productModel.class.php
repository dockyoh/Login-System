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

    public function updateProduct($id, $name, $price, $quantity, $isActive)
    {
        try {
            $query = "UPDATE products SET product_name = :product_name, price = :price, stock_quantity = :quantity, is_active = :is_active WHERE product_id = :product_id;";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':product_id', $id);
            $statement->bindParam(':product_name', $name);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':quantity', $quantity);
            $statement->bindParam(':is_active', $isActive);

            $statement->execute();
        } catch (PDOException $e) {
            die('FAILED TO UPDATE PRODUCT! ' . $e->getMessage());
        }
    }


    // CHECK INTO DATABASE IF THE PRODUCT NAME IS ALREADY TAKEN
    public function checkProdName($prodName)
    {

        try {
            $query = "SELECT COUNT(*) FROM products WHERE product_name = :prodName";

            $statement = $this->connect()->prepare($query);

            $statement->bindParam(':prodName', $prodName);

            $statement->execute();

            $count = $statement->fetchColumn();

            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die('FAILED TO CHECK PRODUCT NAME: ' . $e->getMessage());
        }
    }
}
