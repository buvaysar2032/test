<?php

$data = [
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Петров', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];

$totals = [];

foreach ($data as [$surname, $subject, $score]) {
    $totals[$surname][$subject] ??= 0;
    $totals[$surname][$subject] += $score;
}

$subjectOrder = array_unique(array_column($data, 1));
sort($subjectOrder);

ksort($totals);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <?php foreach ($subjectOrder as $subject) : ?>
                        <th><?= $subject; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totals as $surname => $subjects) : ?>
                    <tr>
                        <td><?= $surname; ?></td>
                        <?php foreach ($subjectOrder as $subject) : ?>
                            <td><?= $subjects[$subject] ?? ''; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>