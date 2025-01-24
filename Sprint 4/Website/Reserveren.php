<?php include 'lib\HeaderFooter\Header.php'; ?>

<main>
    <h2>Reserveren</h2>
    <p>Reserveer hier uw tickets voor de film van uw keuze.</p>
    <form action="" method="post">
        <label for="film">Film:</label>
        <select id="film" name="film" required>
            <option value="Indiana Jones and the Dial of Destiny">Indiana Jones and the Dial of Destiny</option>
            <option value="No Time To Die">No Time To Die</option>
            <option value="Oppenheimer">Oppenheimer</option>
            <option value="Oppenheimer">El Camino</option>
            <option value="Oppenheimer">Terrifier 3</option>
            <option value="Oppenheimer">Hitman: Agent 47</option>
            <option value="Oppenheimer">Plop en de Kabouterschat</option>
        </select>
        
        <label for="date">Datum:</label>
        <input type="date" id="date" name="date" required>
        
        <label for="time">Tijd:</label>
        <input type="time" id="time" name="time" required>
        
        <label for="seats">Aantal tickets:</label>
        <input type="number" id="seats" name="seats" min="1" required>
        
        <button type="submit">Reserveer</button>
    
</main>

<?php include 'lib\HeaderFooter\Footer.php'; ?>