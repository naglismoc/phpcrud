<div class="col-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $book->title ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $book->genre ?></h6>
            <p class="card-text">short summary if we have one</p>
            <a href="../../views/book/show.php?id=<?= $book->id ?>" class="card-link">More</a>
        </div>
    </div>
</div>