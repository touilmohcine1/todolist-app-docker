<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
    } elseif (isset($_POST['complete'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("UPDATE tasks SET is_completed = 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}

$tasks = $pdo->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Nouvelle tâche" required>
        <button type="submit" name="add">Ajouter</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['title']) ?>
                <?php if (!$task['is_completed']): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                        <button type="submit" name="complete">Terminer</button>
                    </form>
                <?php endif; ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button type="submit" name="delete">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
