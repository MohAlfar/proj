<?php
include "../layout/header.php";
include "../../database/Database.php";
include "../../model/Category.php";

$db = new Database();
$conn = $db->connect();

$category = new Category();

if (isset($_POST['create-category'])) {
    $name = $_POST['name'];
    $category->setName($name);
    $category->create($conn);
}
?>

<div class="container">
    <h1>Create Category</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                   placeholder="Name">
        </div>
        <button name="create-category" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include "../layout/footer.php"; ?>
