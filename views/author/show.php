<?php
include_once "../../controllers/AuthorController.php";
include_once "../../controllers/BookController.php";
$author = AuthorController::find($_GET['id']);
$books = BookController::findByAuthorId($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../components/head.php"; ?>
</head>

<body>
    <?php include "../components/navbar.php"; ?>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>cia edita</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" disabled="Petras" value="<?= $author->name ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" disabled placeholder="Vaisnoras" value="<?= $author->surname ?>">
                </div>

            </form>
            <div class="row">
                <?php foreach ($books as $book) {

                    include "../../views/components/bookCard.php";
                } ?>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</body>


</html>