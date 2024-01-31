<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../../controllers/BookController.php";
    BookController::store();
    header("Location: ./index.php");
    die;
}
include "../../controllers/AuthorController.php";
$authors = AuthorController::all();
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
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Petras">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Genre</label>
                    <input type="text" class="form-control" name="genre" placeholder="Vaisnoras">
                </div>

                <select class="form-select" name="authorId">
                    <?php foreach ($authors as $author) { ?>
                        <option value="<?=$author->id?>"><?=$author->name . " " . $author->surname?></option>

                    <?php } ?>
                </select>


                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
            </form>

        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>