<?php include 'lib\HeaderFooter\Header.php'; ?>

<main>
    <?php
    $films = [
        ['title' => 'Film 1', 'description' => 'Description of Film 1'],
        ['title' => 'Film 2', 'description' => 'Description of Film 2'],
        ['title' => 'Film 3', 'description' => 'Description of Film 3'],
    ];

    foreach ($films as $film) {
        echo "<div class='film'>";
        echo "<h2>{$film['title']}</h2>";
        echo "<p>{$film['description']}</p>";
        echo "<button>Bekijk keuzes</button>";
        echo "</div>";
    }
    ?>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>

</html>