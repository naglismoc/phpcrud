<?php

include "../../controllers/BookController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //istrinti
    BookController::destroy();
    header("Location: ./index.php");
}
$books = BookController::all();
// print_r($books);die;
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
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
            <table class="table table-striped">
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>genre</th>
                    <th>Autorius</th>
                    <th>options <a class="btn btn-primary" href="./create.php">sukurti naują</a>
                    </th>
                </tr>
                <?php foreach ($books as $key => $book) { ?>
                    <tr>
                        <td><?= $book->id ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->genre ?></td>
                        <td><a href="../author/show.php?id=<?=$book->authorId?>"><?= $book->author->name . " " . $book->author->surname ?></a></td>
                        <td class="row">
                            <div class="col-2">
                                <a class="btn btn-success" href="./show.php?id=<?= $book->id ?>">show</a>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-primary" href="./edit.php?id=<?= $book->id ?>">edit</a>
                            </div>
                            <div class="col-2">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $book->id ?>">
                                    <button class="btn btn-danger" type="submit">delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php  } ?>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</body>

</html>