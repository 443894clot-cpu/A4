
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex04</title>
</head>
<body>
    <h1> És un palíndrom? </h1>

<?php
    /*
        Escriu una funció esPalindrom($text) 
        que digui si un text es llegeix igual del dret que del revés (ignorant espais i majúscules/minúscules). 
        Fes-la servir des d'un formulari.
    */

     function esPalindrom($text) {
        $net = strtolower($text);
        $net = str_replace(" ", "", $net);
        $net = str_replace(".", "", $net);
        $net = str_replace("\'", "", $net);
        return $net === strrev($net);
    }

?>

<form method="post">
    <label for="text">Escriu una frase:</label>
    <input type="text" name="text" id="text"><br><br>
    <input type="submit" value="Comprova">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["text"])) {
            $text = $_POST["text"];
            echo "<br>\n";
            echo "<h1>".htmlspecialchars($text)."</h1>";
            if (esPalindrom($text)) {
                echo "<p>És un palíndrom!</p>";
            } else {
                echo "<p>No és un palíndrom!</p>";
            }
        }
    }
?>

    <h2> Codi font </h2>
<?php
    show_source("ej4.php");
?>

</body>
</html>
