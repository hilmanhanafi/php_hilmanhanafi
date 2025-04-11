<?php
session_start();
// if request_method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if baris and kolom is set
    if (isset($_POST["baris"]) && isset($_POST["kolom"])) {
        // get baris and kolom
        $_SESSION["baris"] = $_POST["baris"];
        $_SESSION["kolom"] = $_POST["kolom"];

        // header to soal1b.php step 2
        header("Location: soal1b.php?tahapan=2");
        exit;
    }

    // get data by index
    if (isset($_POST["data"])) {
        // get data and send to session
        $_SESSION["data"] = $_POST["data"];




        // header to soal1b.php step 3
        header("Location: soal1a.php?tahapan=3");
        exit;
    }
}

$step = $_GET['tahapan'] ?? 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal1</title>
</head>

<body>
    <?php if ($step == 1) : ?>
        <form method="post">
            <table>
                <tr>
                    <td>Inputkan Jumlah Baris:</td>
                    <td><input type="number" name="baris" id="baris"></td>
                </tr>
                <tr>
                    <td>Inputkan Jumlah Kolom:</td>
                    <td><input type="number" name="kolom" id="kolom"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SUBMIT"></td>
                </tr>
            </table>
        </form>

    <?php elseif ($step == 2) : ?>
        <form method="post">
            <table>
                <?php
                $baris = $_SESSION["baris"];
                $kolom = $_SESSION["kolom"];

                for ($i = 1; $i <= $baris; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= $kolom; $j++) {
                        // number baris and kolom
                        $index = "$i.$j";
                        echo "<td> $i . $j <input type='text' name='data[$index]'></td>";
                    }
                    echo "</tr>";
                }

                ?>
                <tr align="center">
                    <td colspan="<?= $kolom ?>"><input type="submit" value="SUBMIT"></td>
                </tr>

            </table>

        </form>

    <?php elseif ($step == 3) : ?>

        <?php foreach ($_SESSION["data"] as $key => $value) {
            // show value
            echo $key . " : " . $value . "<br>";
        } ?>

    <?php endif; ?>
</body>

</html>