<?php
include "../../controllers/BookController.php";
$book = BookController::find($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../components/head.php"; ?>
</head>

<body>
    <?php include "../components/navbar.php"; ?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Knyga</h1>
            <a href="../../views/book/index.php">Visos knygos</a>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" disabled="Petras" value="<?= $book->title ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" disabled placeholder="Vaisnoras" value="<?= $book->genre ?>">
                </div>

                
            </form>
            <a href="../../views/author/show.php?id=<?=$book->authorId?>"><?=$book->author->name . " " . $book->author->surname?> ir jo knygos</a>

        </div>
        <div class="col-3"></div>
    </div>
</body>


</html>