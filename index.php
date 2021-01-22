<?php

require_once(__DIR__ . '/config.php');

$pdo = Database::getPdo();
$todo = new Todo($pdo);
$todo->processPost();
$todos = $todo->getAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Todos</h1>

    <form action="?action=add" method="post" class="add-form">
        <input type="text" name="title" placeholder="新しいタスクを追加" class="task-input">
        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
        <button>追加</button>
    </form>

    <form action="?action=allDelete" method="post">
        <button class="all-delete">完了タスク一括削除</button>
        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
    </form>

    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <form action="?action=toggle" method="post">
                    <input type="checkbox" id="<?= 'task-checkbox' . $todo->id ?>" class="checkbox" <?= $todo->is_done ? 'checked' : ''; ?>>
                    <input type="hidden" name="id" value="<?= Utils::h($todo->id); ?>">
                    <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
                </form>

                <span class="<?= $todo->is_done ? 'done' : ''; ?>">
                    <label for="<?= 'task-checkbox' . $todo->id ?>">
                    <a href="show.php?id=<?= $todo->id ?>"><?= Utils::h($todo->title); ?></a>
                    </label>
                </span>

                <?php if ($todo->is_done) :?>
                    <form action="?action=delete" method="post"  class="delete-form">
                        <input type="hidden" name="id" value="<?= Utils::h($todo->id); ?>">
                        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
                        <button class="delete">削除する</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <script src="js/main.js"></script>
</body>
</html>
