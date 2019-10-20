<?php


class Category
{
    private $name;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function create($conn)
    {
        $sql = "INSERT INTO categories (name) VALUES ('$this->name');";
        $conn->exec($sql);
    }

    function getAll($conn)
    {
        $stmt = $conn->prepare("SELECT id, name FROM categories");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

