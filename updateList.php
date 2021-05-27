<?php
    require "./header.php";
    include "./database.php";
    $pdo = connect();

    $sql = "SELECT * FROM `list` WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
    $req->execute();
    $list = $req->fetch();

    if ($_POST) {
        $name = $_POST["name"];
        $color = $_POST["color"];

        $sql = "UPDATE `list` SET name = :name, color = :color WHERE id = :id";
        $req = $pdo->prepare($sql);
        $req->bindParam(":name", $name, PDO::PARAM_STR);
        $req->bindParam(":color", $color, PDO::PARAM_STR);
        $req->bindParam(":id", $list["id"], PDO::PARAM_INT);
        $req->execute();

        echo "<script>window.location.href='index.php'</script>";
        // header("Location: index.php");
    }
?>

    <form method="post" class="container">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" id="name" value="<?= $list["name"] ?>" class="form-control" placeholder="Nom de la liste">
        <label for="color" class="form-label">Couleur</label>
        <input type="color" name="color" id="color" value="<?= $list["color"] ?>" class="form-control">
        <input type="submit" value="Modifier" class="btn btn-primary mt-2">
    </form>
<?php require "./footer.php" ?>