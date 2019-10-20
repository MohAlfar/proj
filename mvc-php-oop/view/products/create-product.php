<?php
include "../layout/header.php";
include "../../database/Database.php";
include "../../model/Product.php";
include "../../model/Category.php";

$db = new Database();
$conn = $db->connect();
$product = new Product();

$category = new Category();
$categories = $category->getAll($conn);


if (isset($_POST['create-product'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $product->setName($name);
    $product->setDescription($desc);
    $product->setPrice($price);
    $product->setCategoryId($category_id);

    $product->create($conn);
}


?>

<div class="container">
    <h1>Create Products</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                   placeholder="Name">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input name="desc" type="text" class="form-control" id="desc" aria-describedby="emailHelp"
                   placeholder="Description">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="number" class="form-control" id="price" aria-describedby="emailHelp"
                   placeholder="Price">
        </div>
        <div class="form-group">
            <label for="category">Categories</label>
            <select name="category_id" class="custom-select" id="category">
                <option selected>Select category</option>
                <?php
                foreach ($categories as $row) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value='$id'>$name</option>";
                }
                ?>
            </select>
        </div>
        <button name="create-product" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "../layout/footer.php"; ?>
