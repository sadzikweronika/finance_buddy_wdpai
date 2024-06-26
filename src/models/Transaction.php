<?php

class Transaction {
    private $name;
    private $price;
    private $category;
    private $type;
    private $image;

    public function __construct($name, $price, $category, $type, $image) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->type = $type;
        $this->image = $image;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($name) {
        $this->name = $name;
    }
}