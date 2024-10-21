<?php

require_once __DIR__ . '/model.php';
$data = getData($path = __DIR__ . '/personnes');



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trombinoscope</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="title my-5">Trombinoscope - Bachelor 2</h1>
        <div class="row">
            <?php foreach ($data as $personne) : ?>
                <?php
                    $src = explode('\\', $personne->src);
                    $personne->src = 'personnes/' . array_pop($src);
                    
                ?>
                <div class="card col-12 col-sm-6 p-0">
                    <img src="<?= $personne->src ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title"><?= ucfirst(strtolower($personne->prenom)) ?> <?= strtoupper($personne->nom) ?></h2>
                        <p class="card-text"> <?=  nl2br($personne->description) ?></p>
                    </div>
                </div>
               
            <?php endforeach ?>
        </div>
    </div>


</body>

</html>