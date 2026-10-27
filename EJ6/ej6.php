
<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ex06</title>
</head>
<body>
    <h1> Comptador de visites amb static </h1>

<?php
    /*
        Escriu una funció que compti quants cops se l'ha cridat,
        fent servir una variable static.
        Crida-la 3 cops seguides en una mateixa pàgina
        (sense formulari) i mostra el resultat de cada crida.
    */

    function comptador() {
        static $n = 0;
        $n++;
        return $n;
    }

    echo "<p>Primera crida: " . comptador() . "</p>";
    echo "<p>Segona crida: " . comptador() . "</p>";
    echo "<p>Tercera crida: " . comptador() . "</p>";
    echo "<p><em>Nota: el comptador només es manté mentre dura aquesta càrrega de la pàgina. Si recarregues, torna a començar per 1.</em></p>";
?>

    <h2> Codi font </h2>
<?php
    show_source("ej6.php");
?>

</body>
</html>
