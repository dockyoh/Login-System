<?php
require_once '../pure/sessionConfig.pure.php';

class ProductController
{
    private $productId;
    private $productName;
    private $price;
    private $quantity;
    private $isActive;

    private $productModel;

    private $errors = [];

    public function __construct($id, $name, $price, $quantity, $isActive)
    {
        $this->productId = $id;
        $this->productName = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->isActive = $isActive;

        $this->productModel = new ProductModel();
    }

    // FOR ADD CONTROLLER
    private function isEmpty()
    {
        if (empty($this->productName) || empty($this->price) || empty($this->quantity)) {
            $this->errors['empty'] = 'PLEASE FILL ALL THE INPUTS!';
            $this->errorHandler();
            return true;
        } else {
            return false;
        }
    }

    private function isPriceNumeric()
    {
        if (is_numeric($this->price)) {
            return true;
        } else {
            $this->errors['numericPrice'] = 'PRICE SHOULD BE NUMERIC!';
            $this->errorHandler();
            return false;
        }
    }

    private function isQuantityNumeric()
    {
        if (is_numeric($this->quantity)) {
            return true;
        } else {
            $this->errors['numericQuantity'] = 'QUANTITY SHOULD BE NUMERIC!';
            $this->errorHandler();
            return false;
        }
    }

    private function isPositiveNumber()
    {
        if (($this->price >= 0) && ($this->quantity >= 0)) {
            return true;
        } else {
            $this->errors['positiveNum'] = 'IT SHOULD BE A POSITIVE NUMBER!';
            $this->errorHandler();
            return false;
        }
    }

    private function errorHandler()
    {
        if (!empty($this->errors)) {
            $_SESSION['addErrors'] = $this->errors;
        } else {
            $_SESSION['addErrors'] = ['ADDED' => 'PRODUCT ADDED SUCCESSFULLY!'];
        }
    }

    public function isErrors()
    {
        $empty = $this->isEmpty();
        $priceNum = $this->isPriceNumeric();
        $quantityNum = $this->isQuantityNumeric();
        $positiveNum = $this->isPositiveNumber();

        if ($empty || !$priceNum || !$quantityNum || !$positiveNum) {
            return true;
        } else {
            $this->errorHandler();
            return false;
        }
    }

    public function addProduct()
    {
        if (!$this->isErrors()) {
            $this->productModel->insertProduct($this->productName, $this->price, $this->quantity);
        }
    }

    public function deleteProduct()
    {
        $this->productModel->deleteProduct($this->productId);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FOR UPDATE CONTROLLER
    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    private function isUpdateEmpty()
    {
        if (empty($this->productName)) {
            $this->errors['empty'] = 'PLEASE UPDATE THE PRODUCT NAME!';
            $this->errorHandler();
            return true;
        } else {
            return false;
        }
    }

    public function isUpdateErrors()
    {
        $empty = $this->isUpdateEmpty();
        if ($empty) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct()
    {
        $this->productModel->updateProduct($this->productId, $this->productName, $this->price, $this->quantity, $this->isActive);
    }
}
