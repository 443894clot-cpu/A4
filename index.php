
<?php
// CONFIGURACIÓ DE LA PRÀCTICA
$practica = "Pràctica 4";
$descripcio = "Introducció al PHP";

// MOSTRAR CARPETES I EXERCICIS
function mostrarContingut(string $ruta, string $url = ''): void
{
    $elements = scandir($ruta);

    if ($elements === false) {
        return;
    }

    natcasesort($elements);

    echo '<ul class="llista">';

    foreach ($elements as $element) {

        // Ignorar fitxers ocults, index.php i .old
        if (
            str_starts_with($element, '.') ||
            $element === 'index.php' ||
            str_contains($element, '.old')
        ) {
            continue;
        }

        $rutaCompleta = $ruta . DIRECTORY_SEPARATOR . $element;
        $urlCompleta = $url . '/' . rawurlencode($element);
        $nom = htmlspecialchars($element, ENT_QUOTES, 'UTF-8');
        $enllac = htmlspecialchars($urlCompleta, ENT_QUOTES, 'UTF-8');

        if (is_dir($rutaCompleta)) {

            echo '<li class="carpeta">';
            echo '<div class="nom-carpeta">' . $nom . '</div>';

            mostrarContingut($rutaCompleta, $urlCompleta);

            echo '</li>';

        } elseif (
            is_file($rutaCompleta) &&
            preg_match('/\.(php|html?)$/i', $element)
        ) {

            echo '<li class="fitxer">';
            echo '<a href="' . $enllac . '">';
            echo '<span>' . $nom . '</span>';
            echo '<span class="fletxa">&rarr;</span>';
            echo '</a>';
            echo '</li>';
        }
    }

    echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapeia - SM7 | <?= htmlspecialchars($practica) ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #263449;
        }

        .contenidor {
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            background: #172b4d;
            color: white;
            padding: 35px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .etiqueta {
            color: #a8c5f3;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 12px 0;
            font-size: 32px;
        }

        .subtitol {
            color: #d5e2f3;
            margin: 0;
        }

        main {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        h2 {
            font-size: 21px;
            margin: 0 0 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .llista {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .llista .llista {
            padding-left: 18px;
            margin-top: 10px;
            border-left: 2px solid #e2e8f0;
        }

        .carpeta {
            margin: 15px 0;
        }

        .nom-carpeta {
            font-weight: bold;
            color: #2456a6;
            padding: 10px 12px;
            background: #f1f5fb;
            border-radius: 6px;
        }

        .fitxer {
            margin: 5px 0;
        }

        .fitxer a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 11px 14px;
            color: #334155;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .fitxer a:hover {
            background: #eef4fc;
            color: #2456a6;
        }

        .fletxa {
            color: #94a3b8;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #64748b;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            header, main {
                padding: 22px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <div class="contenidor">

        <header>
            <div class="etiqueta">Desenvolupament Web</div>
            <h1>Mapeia - SM7</h1>
            <p class="subtitol">
                <?= htmlspecialchars($practica) ?>
                ·
                <?= htmlspecialchars($descripcio) ?>
            </p>
        </header>

        <main>
            <h2>Índex d'exercicis</h2>

            <?php mostrarContingut(__DIR__); ?>
        </main>

        <footer>
            Mapeia · SM7 · Desenvolupament Web
        </footer>

    </div>
</body>
</html>
