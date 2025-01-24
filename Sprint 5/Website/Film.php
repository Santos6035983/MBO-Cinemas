<?php include 'lib\HeaderFooter\Header.php'; ?>

<main>
    <?php
    $films = array(
        "film1" => array(
            "title" => "Indiana Jones and the Dial of Destiny",
            "shortDescription" => "De man met de hoed keert terug voor een laatste avontuur. Indiana Jones and the Dial of Destiny brengt Harrison Ford terug in zijn iconische rol als onze favoriete archeoloog op het scherm.",
            "genre" => "Avontuur",
            "director" => "James Mangold",
            "rating" => 4.5,
            "pegi-rating" => 12,
            "link" => "https://www.youtube.com/watch?v=OrzWxJVWL_g",
            "images" => array("images/Films/Indiana Jones and the Dial of Destiny.png")
        ),
        "film2" => array(
            "title" => "No Time To Die",
            "shortDescription" => "In de 25ste James Bond-film No Time To Die heeft James Bond zijn turbulente leven als geheim agent achter zich gelaten en leidt hij een rustig bestaan op Jamaica.",
            "genre" => "Actie",
            "director" => "Cary Joji Fukunaga",
            "rating" => 4.7,
            "pegi-rating" => 12,
            "link" => "https://www.youtube.com/watch?v=BIhNsAtPbPI",
            "images" => array("images/Films/No Time To Die.png")
        ),
        "film3" => array(
            "title" => "Oppenheimer",
            "shortDescription" => "Oppenheimer, geschreven en geregisseerd door Christopher Nolan, is een met IMAX®-camera’s gedraaide epische thriller die het fascinerende verhaal vertelt van de raadselachtige man die om de wereld te redden het risico moet nemen dat deze wordt verwoest.",
            "genre" => "Biografie",
            "director" => "Christopher Nolan",
            "rating" => 4.8,
            "pegi-rating" => 16,
            "link" => "https://www.youtube.com/watch?v=dpUxTXCrom4",
            "images" => array("images/Films/Oppenheimer.png")
        ),
        
    );

    $gekozenFilm = isset($_GET['filmID']) ? $_GET['filmID'] : 'film1';

    if (isset($films[$gekozenFilm])) {
        $gekozenFilmInfo = $films[$gekozenFilm];

        echo "<h2>" . $gekozenFilmInfo['title'] . "</h2>";
        echo "<p><strong>Korte Beschrijving:</strong> " . $gekozenFilmInfo['shortDescription'] . "</p>";
        echo "<p><strong>Genre:</strong> " . $gekozenFilmInfo['genre'] . "</p>";
        echo "<p><strong>Regisseur:</strong> " . $gekozenFilmInfo['director'] . "</p>";
        echo "<p><strong>Rating:</strong> " . $gekozenFilmInfo['rating'] . " Sterren</p>";
        echo "<p><strong>PEGI-Rating:</strong> " . $gekozenFilmInfo['pegi-rating'] . "+</p>";
        echo "<p class='linki'><strong>Trailer:</strong> <a class='link' href='" . $gekozenFilmInfo['link'] . "'>Bekijk op YouTube</a></p>";

        foreach ($gekozenFilmInfo['images'] as $image) {
            echo "<img class='film-image' src='" . $image . "' alt='Film Image'>";
        }
    } else {
        echo "Ongeldige film geselecteerd.";
    }
    ?>
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>

</html>