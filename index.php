<?php require "./header.php" ?>
<div class="d-flex flex-wrap">
<?php
    include "./database.php";
    $pdo = connect();
    foreach ($pdo->query("SELECT * FROM `list` ORDER BY name") as $list) { ?>
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title" style="color: <?= $list['color'] ?>"><?= $list["name"] ?></h5>
                <p class="card-text">
                    <?php foreach ($pdo->query("SELECT * FROM `task` WHERE list_id = {$list['id']} ORDER BY title") as $task) { ?>
                        <input type="checkbox" <?= $task["completed"] ? "checked" : "" ?> onchange="window.location.href='./updateStatus.php?id=<?= $task['id'] ?>'">
                        <a href="./updateTask.php?id=<?= $task["id"] ?>"><?= $task["completed"] ? "<del>" : "" ?><?= $task["title"] ?><?= $task["completed"] ? "</del>" : "" ?></a>
                        <a class="text-danger" href="./deleteTask.php?id=<?= $task["id"] ?>"><i class="fas fa-trash"></i></a><br>
                    <?php } ?>
                    <center><a href="./createTask.php?id=<?= $list["id"] ?>"><i class="fas fa-plus-circle fa-2x"></i></a></center>
                </p>
                <a href="./updateList.php?id=<?= $list["id"] ?>" class="btn btn-warning">Modifier</a>
                <a href="./deleteList.php?id=<?= $list["id"] ?>" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
<?php } ?>

</div>

<?php require "./footer.php" ?>
