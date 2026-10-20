
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex02</title>
</head>
<body>
    <h1> Paraula prohibida </h1>

<?php
    /*
        Fes un formulari amb un textarea.
        Si el text conté una paraula prohibida que tu decideixis,
        avisa'n i digues a quina posició hi apareix.
    */
?>

<form method="post">
    <label>Escriu un text:<br></label>
    <textarea name="text" rows="4" cols="50"></textarea><br>

    <input type="submit" value="Comprova">
</form>

<?php
    if (isset($_POST["text"])) {
        $paraulaP = "php";
        $text = strtolower(trim($_POST["text"]));
        $pos = strpos($text, $paraulaP);

        if ($pos === false) {
            echo "<p>Text correcte, no s'hi troba la paraula prohibida.</p>";
        } else {
            echo "<p>Paraula prohibida trobada a la posició: " . $pos . "</p>";
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej2.php");
?>

</body>
</html>
