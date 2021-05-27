<?php
    include "./database.php";
    $pdo = connect();

    $id = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));

    $sql = "SELECT * FROM `task` WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $task = $req->fetch();

    $completed = $task["completed"] ? 0 : 1;

    $sql = "UPDATE `task` SET completed = :completed WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->bindParam(":completed", $completed, PDO::PARAM_INT);
    $req->bindParam(":id", $task["id"], PDO::PARAM_INT);
    $req->execute();

    echo "<script>window.location.href='index.php'</script>";
?>