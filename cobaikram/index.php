<?php
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$rawHeight = $_POST['height'] ?? '';
$height = is_string($rawHeight) ? filter_var($rawHeight, FILTER_VALIDATE_INT) : false;
$isValid = $submitted && $height !== false && $height >= 1 && $height <= 20;
$inputValue = is_string($rawHeight) ? htmlspecialchars($rawHeight, ENT_QUOTES, 'UTF-8') : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Segitiga Bintang PHP</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Segitiga Bintang</h1>

    <form method="post">
        <label for="height">Tinggi segitiga (1–20):</label>
        <input
            type="number"
            id="height"
            name="height"
            min="1"
            max="20"
            step="1"
            value="<?= $inputValue ?>"
            required
        >
        <button type="submit">Tampilkan</button>
    </form>

    <?php if ($submitted && !$isValid): ?>
        <p class="error" role="alert">Masukkan bilangan bulat dari 1 sampai 20.</p>
    <?php elseif ($isValid): ?>
        <div class="patterns">
            <section>
                <h2>Atas</h2>
                <pre><?php
                    for ($row = 1; $row <= $height; $row++) {
                        for ($space = 1; $space <= $height - $row; $space++) {
                            echo ' ';
                        }
                        for ($star = 1; $star <= (2 * $row - 1); $star++) {
                            echo '*';
                        }
                        echo "\n";
                    }
                ?></pre>
            </section>
            <section>
                <h2>Bawah</h2>
                <pre><?php
                    for ($row = $height; $row >= 1; $row--) {
                        for ($space = 1; $space <= $height - $row; $space++) {
                            echo ' ';
                        }
                        for ($star = 1; $star <= (2 * $row - 1); $star++) {
                            echo '*';
                        }
                        echo "\n";
                    }
                ?></pre>
            </section>
            <section>
                <h2>Kiri</h2>
                <pre><?php
                    for ($row = 1; $row <= (2 * $height - 1); $row++) {
                        $starCount = $row <= $height ? $row : (2 * $height - $row);
                        for ($star = 1; $star <= $starCount; $star++) {
                            echo '*';
                        }
                        echo "\n";
                    }
                ?></pre>
            </section>
            <section>
                <h2>Kanan</h2>
                <pre><?php
                    for ($row = 1; $row <= (2 * $height - 1); $row++) {
                        $starCount = $row <= $height ? $row : (2 * $height - $row);
                        for ($space = 1; $space <= $height - $starCount; $space++) {
                            echo ' ';
                        }
                        for ($star = 1; $star <= $starCount; $star++) {
                            echo '*';
                        }
                        echo "\n";
                    }
                ?></pre>
            </section>
        </div>
    <?php endif; ?>
</body>
</html>
