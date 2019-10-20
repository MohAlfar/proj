<?php

class Product
{
    private $name;
    private $description;
    private $price;
    private $category_id;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }


    function create($conn)
    {
        $sql = "INSERT INTO products (name, description, price, category_id) 
                VALUES ('$this->name', '$this->description', $this->price, $this->category_id)";

        $conn->exec($sql);
    }

}
