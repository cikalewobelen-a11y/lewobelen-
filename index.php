<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do List / Daftar Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📝 To-Do List / Daftar Tugas</h1>

        <!-- Form Tambah Tugas -->
        <form action="add.php" method="POST" class="form">
            <input type="text" name="task" placeholder="Tulis tugas baru..." required>
            <button type="submit">Tambah</button>
        </form>

        <!-- Daftar Tugas -->
        <table>
            <tr>
                <th>No</th>
                <th>Nama Tugas</th>
                <th>Aksi</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
            $no = 1;
            while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['task']); ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $row['id']; ?>">✏️ Edit</a>
                    <a class="delete" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus tugas ini?');">❌ Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
