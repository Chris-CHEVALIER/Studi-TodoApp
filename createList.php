<?php
    require "./header.php";
    if ($_POST) {
        include "./database.php";
        $pdo = connect();

        $name = $_POST["name"];
        $color = $_POST["color"];

        $sql = "INSERT INTO `list` (name, color) VALUES (:name, :color)";
        $req = $pdo->prepare($sql);
        $req->bindParam(":name", $name, PDO::PARAM_STR);
        $req->bindParam(":color", $color, PDO::PARAM_STR);
        $req->execute();

        echo "<script>window.location.href='index.php'</script>";
        // header("Location: index.php");
    }
?>

    <form method="post" class="container">
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nom de la liste">
        <label for="color" class="form-label">Couleur</label>
        <input type="color" name="color" id="color" class="form-control">
        <input type="submit" value="Créer" class="btn btn-primary mt-2">
    </form>
<?php require "./footer.php" ?>