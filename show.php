<?php

require_once(__DIR__ . '/config.php');

$pdo = Database::getPdo();
$model = new Todo($pdo);
$todo = $model->getTodo($_GET['id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>タスクタイトル詳細</h1>
<?= Utils::h($todo->title); ?>
</body>
</html>
