<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            header{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>
                <?= $greeting ?>
            </h1>
        </header>
        <div>
            <ul>
                <?php foreach($names as $name) : ?>

                    <li><?= $name ?></li>

                <?php endforeach; ?>
            </ul>
            <ul>
                    <?php

                        foreach($names as $name){
                            echo "<li> $name </li>";
                        }

                    ?>
            </ul>
            <ul>
            <!-- This way provides the value -->
                <?php foreach($person as $p) : ?>

                    <li><?= $p ?></li>

                <?php endforeach; ?>
            </ul>
            <ul>
            <!-- This way provides both the key and value -->
                <?php foreach($person as $key => $val) : ?>

                    <li><strong><?= $key ?></strong>: <?= $val ?></li>

                <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>