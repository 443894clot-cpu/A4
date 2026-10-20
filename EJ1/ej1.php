
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex01</title>
</head>
<body>
    <h1> Normalitzar un nom </h1>

<?php
    /*
        Fes un formulari amb un camp de nom.
        Mostra'l "net": sense espais als extrems,
        i amb només la primera lletra en majúscula.
    */
?>

<form method="post">
    <label>Nom:</label>
    <input type="text" name="nom">

    <input type="submit" value="Normalitzar">
</form>

<?php
    if (isset($_POST["nom"])) {

        $nom = ucfirst(strtolower(trim($_POST["nom"])));

        echo "<p>Nom normalitzat: " . htmlspecialchars($nom) . "</p>";
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej1.php");
?>

</body>
</html>
