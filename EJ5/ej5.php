
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex05</title>
</head>
<body>
    <h1> Títol amb nivell per defecte </h1>

<?php
    /*
        Escriu una funció formatTitol($text, $nivell = 1)
        que generi l'etiqueta HTML de títol corresponent.
        Des d'un formulari amb un text i un select de nivell opcional,
        mostra el resultat.
    */

    function formatTitol($text, $nivell = 1) {
        return "<h$nivell>" . htmlspecialchars($text) . "</h$nivell>";
    }
?>

<form method="post">
    <label for="text">Text del títol:</label>
    <input type="text" name="text" id="text"><br><br>

    <label for="nivell">Nivell (1-4, opcional):</label>
    <select name="nivell" id="nivell">
        <option value="">-- Per defecte --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <br><br>
    <input type="submit" value="Genera">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["text"])) {
            $text = $_POST["text"];

            echo "<br>\n";

            if (isset($_POST["nivell"]) && $_POST["nivell"] != "") {
                echo formatTitol($text, (int) $_POST["nivell"]);
            } else {
                echo formatTitol($text);
            }
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej5.php");
?>

</body>
</html>
