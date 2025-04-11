<?php

include 'config/database.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT nama_hobi, COUNT(person_id) as total_person FROM hobi WHERE nama_hobi LIKE ? GROUP BY nama_hobi";
$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2 - Laporan Hobi</title>
</head>

<body>
    <h2>Laporan Hobi</h2>

    <form method="get">
        <tr>
            <td>
                <label for="hobi">Cari berdasarkan Hobi: </label>
            </td>
            <td>
                <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>">
            </td>
            <td>
                <button type="submit">Search</button>
            </td>
        </tr>
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Hobi</th>
                <th>Jumlah Orang</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_hobi']) ?></td>
                    <td><?= htmlspecialchars($row['total_person']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>

<?php
$stmt->close();
$conn->close();
?>