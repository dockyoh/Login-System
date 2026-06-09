<?php

class AddController
{
    private $productName;
    private $price;
    private $quantity;

    private $addModel;

    public function __construct($name, $price, $quantity)
    {
        $this->productName = $name;
        $this->price = $price;
        $this->quantity = $quantity;

        $this->addModel = new AddModel();
    }

    private function isEmpty()
    {
        if ($this->productName || $this->price || $this->quantity) {
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
            return false;
        }
    }

    private function isQuantityNumeric()
    {
        if (is_numeric($this->quantity)) {
            return true;
        } else {
            return false;
        }
    }

    private function isPositiveNumber()
    {
        if (($this->price >= 0) && ($this->quantity >= 0)) {
            return true;
        } else {
            return false;
        }
    }

    public function isErrors()
    {
        $empty = $this->isEmpty();
        $priceNum = $this->isPriceNumeric();
        $quantityNum = $this->isQuantityNumeric();
        $positiveNum = $this->isPositiveNumber();

        if ($empty && !$priceNum && !$quantityNum && !$positiveNum) {
            return true;
        } else {
            return false;
        }
    }

    public function addProduct()
    {
        if (!$this->isErrors()) {
            $this->addModel->insertProduct($this->productName, $this->price, $this->quantity);
        }
    }
}
