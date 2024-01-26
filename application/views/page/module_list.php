<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Module List</title>
</head>
<body>

    <h1>List of JavaScript Modules</h1>

    <ul>
        <?php foreach ($modules as $module): ?>
            <li><?= $module; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>