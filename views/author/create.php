<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../../controllers/AuthorController.php";
    AuthorController::store();
    header("Location: ./index.php");
    die;
}

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
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control"  name="name" placeholder="Petras">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Surname</label>
                    <input type="text" class="form-control" name="surname" placeholder="Vaisnoras">
                </div>


                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
            </form>

        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>