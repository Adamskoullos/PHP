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
        <h5>
            <?= $result; ?>
        </h5>
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
            <ul>
            <!-- ucwords() capitalises the word -->
                <?php foreach($devStack as $key => $val) : ?>

                    <li><strong><?= ucwords($key); ?></strong>: <?= $val ?></li>

                <?php endforeach; ?>
            </ul>
            <ul>
                <li>
                    <strong>Stack: </strong><?= $devStack['stackName']; ?>
                </li>
                <li>
                    <strong>Front-End Framework: </strong><?= $devStack['front-end']; ?>
                </li>
                <li>
                    <strong>Back-End Framework: </strong><?= $devStack['back-end']; ?>
                </li>
                <li>
                    <strong>Cloud Infrastructure: </strong><?= $devStack['cloud']; ?>
                </li>
                <li>
                    <strong>Are the team AWS Certified: </strong><?= $devStack['boolean'] ? 'All the team is AWS Cerified' : 'No AWS Cerifiication'; ?>
                </li>
            </ul>
        </div>
    </body>
</html>