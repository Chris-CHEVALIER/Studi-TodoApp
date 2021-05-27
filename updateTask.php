<?php
    require "./header.php";

    include "./database.php";
    $pdo = connect();

    $sql = "SELECT * FROM `task` WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $req->execute();
    $task = $req->fetch();

    if ($_POST) {
        $title = $_POST["title"];

        $sql = "UPDATE `task` SET title = :title WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":id", $task["id"], PDO::PARAM_INT);
        $req->execute();

        echo "<script>window.location.href='index.php'</script>";
        // header("Location: index.php");
    }
?>

    <form method="post" class="container">
        <label for="title" class="form-label">Nom</label>
        <input type="text" name="title" value="<?= $task["title"] ?>" id="title" class="form-control" placeholder="Nom de la tâche">
        <input type="submit" value="Modifier" class="btn btn-primary mt-2">
    </form>
<?php require "./footer.php" ?>