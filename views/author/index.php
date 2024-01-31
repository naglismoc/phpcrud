<?php

include "../../controllers/AuthorController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //istrinti
    AuthorController::destroy();
    header("Location: ./index.php");
}
$authors = AuthorController::all(isset($_GET['sort']) ? $_GET['sort'] : false);

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
            <form class="d-flex" action="./index.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" name="search">
                <input type="hidden" name="sort" value="<?=isset($_GET['sort']) ? $_GET['sort'] : '1'?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <table class="table table-striped">
                <tr>
                    <th>id
                        <a href="./index.php?sort=1<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▼</a>
                        <a href="./index.php?sort=2<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▲</a>
                    </th>
                    <th>name
                        <a href="./index.php?sort=3<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▼</a>
                        <a href="./index.php?sort=4<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▲</a>
                    </th>
                    <th>surname
                        <a href="./index.php?sort=5<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▼</a>
                        <a href="./index.php?sort=6<?=isset($_GET['search']) ? "&search=".$_GET['search'] : ''?>">▲</a>
                    </th>
                    <th>options <a class="btn btn-primary" href="./create.php">sukurti naują</a>
                    </th>
                </tr>
                <?php foreach ($authors as $key => $author) { ?>
                    <tr>
                        <td><?= $author->id ?></td>
                        <td><?= $author->name ?></td>
                        <td><?= $author->surname ?></td>
                        <td class="row">
                            <div class="col-2">
                                <a class="btn btn-success" href="./show.php?id=<?= $author->id ?>">show</a>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary" href="./edit.php?id=<?= $author->id ?>">edit</a>
                            </div>
                            <div class="col-2">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $author->id ?>">
                                    <button class="btn btn-danger" type="submit">delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php  } ?>
            </table>
        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>