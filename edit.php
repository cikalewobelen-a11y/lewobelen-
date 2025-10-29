<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    $conn->query("UPDATE tasks SET task='$task' WHERE id=$id");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Tugas</h2>
    <form method="POST">
        <input type="text" name="task" value="<?= htmlspecialchars($row['task']); ?>" required>
        <button type="submit">Simpan Perubahan</button>
        <a href="index.php" class="cancel">Batal</a>
    </form>
</div>
</body>
</html>
