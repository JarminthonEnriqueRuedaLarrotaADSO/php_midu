<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            color: white;
        }

        img {
            border-radius: 8px;
            width: 300px;
            margin: auto;
            display: flex;
        }

        section {
            background-color: gray;
            padding: 10%;
            margin: 10%;
            border-radius: 8px;
            box-shadow: 20px 20px 20px black;
            /* Añade sombra */
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        p {
            text-align: center;

        }

        h2,
        span {
            font-weight: bold;
            color: black;
        }
    </style>


</head>

<body>
    
    <section>
        <h1>
            La proxima pelicula de marvel es
        </h1>
        <h2>
            <?= $data['title']; ?>
        </h2>
        <h3>
            Dias restantes : <span><?= $data['days_until']; ?></span>
        </h3>
        <img src="<?= $data['poster_url'];  ?>" alt="Next Movie <?= $data['title'] ?>">
        <p>
            About This Movie : <?= $data['overview']; ?>
        </p>
        <p>
            Fecha de estreno : <span><?= $data['release_date']; ?></span>
        </p>
        <h4> Siguiente estreno : <?= $data['following_production']['title']; ?> </h4>
        <h5>
            Dias faltantes : <?= $data['following_production']['days_until']; ?>
        </h5>
    </section>
</body>

</html>