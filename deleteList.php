<?php
    include "./database.php";
    $pdo = connect();

    $id = trim(htmlspecialchars($_GET["id"], ENT_QUOTES));
    $sql = "DELETE FROM `list` WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->bindParam(":id", $id, PDO::PARAM_INT);
    $req->execute();

    echo "<script>window.location.href='index.php'</script>";
?>