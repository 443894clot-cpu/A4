
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex03</title>
</head>
<body>
    <h1> Cistella de la compra </h1>

<?php
    /*
        Parteix d'una cistella fixa al codi
        (per exemple ["Pa", "Llet"]). Amb un formulari,
        permet afegir-hi un article nou i, amb una casella,
        treure'n l'últim.
        Mostra la cistella resultant.
    */
?>

<form method="post">
    Article a afegir: <input type="text" name="article"><br>
    <label><input type="checkbox" name="treu" value="1"> Treu l'últim article</label><br>
    <input type="submit" value="Actualitza la cistella">
</form>

<?php
    $cistella = ["Pa", "Llet"];

    if (isset($_POST["treu"]) && $_POST["treu"] == true) {
        array_pop($cistella);
    }

    if (isset($_POST["article"])) {
        $article = htmlspecialchars(ucfirst(strtolower(trim($_POST["article"]))));

        if ($article != "") {
            array_push($cistella, $article);
        }
    }

    echo "<h3>Cistella actual</h3>";
    echo "<ul>";

    foreach ($cistella as $key => $value) {
        echo "<li>" . $value . "</li>";
    }

    echo "</ul>";
?>

    <h2> Codi font </h2>
<?php
    show_source("ej3.php");
?>

</body>
</html>
