
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex07</title>
</head>
<body>
    <h1> Afegir l'IVA per referència </h1>

<?php
    /*
        Escriu una funció afegirIVA(&$preu) que modifiqui
        directament el preu rebut, afegint-hi un 21%.
        Des d'un formulari amb un preu, mostra'l abans
        i després de cridar la funció.
    */

    function afegirIVA(&$preu) {
        $preu = $preu * 1.21;
    }
?>

<form method="post">
    <label for="preu">Preu sense IVA:</label>
    <input type="text" name="preu" id="preu" size="8">
    <input type="submit" value="Afegeix IVA (21%)">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["preu"]) && is_numeric($_POST["preu"])) {
            $preu = (float) $_POST["preu"];
            echo "<p>Preu sense IVA: " . $preu . " €</p>";
            afegirIVA($preu);
            echo "<p>Preu amb IVA: " . round($preu, 2) . " €</p>";
        } else {
            echo "<p>Escriu un preu vàlid.</p>";
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej7.php");
?>

</body>
</html>
