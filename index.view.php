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
                Working With MySQL
            </h1>
            <ul>
                <?php foreach ($tasks as $task) : ?>
                    <li>
                        <?php if($task->completed) : ?>
                            <strike><?= $task->description; ?></strike>
                        <?php else: ?>
                            <?= $task->description; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </header>

    </body>
</html>