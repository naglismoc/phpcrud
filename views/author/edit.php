<?php
include "../../controllers/AuthorController.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    AuthorController::update();
    header("Location: ./index.php");
    die;
}

$author = AuthorController::find($_GET['id']);
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
            <h1>cia edita</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Petras" value="<?= $author->name ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" placeholder="Vaisnoras" value="<?= $author->surname ?>">
                </div>


                <div class="mb-3">
                    <input type="hidden" name="id" value="<?=$author->id?>">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
            </form>

        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>