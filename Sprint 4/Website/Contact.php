<?php include 'lib\HeaderFooter\Header.php'; ?>

    <main>
        <h2>Contact</h2>
        <p>Neem contact met ons op via het onderstaande formulier of via de contactgegevens.</p>
        <form action="" method="post">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Bericht:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Verstuur</button>
        </form>
        <section>
            <h3>Onze gegevens</h3>
            <p>Adres: Bioscoopstraat 123, 1234 AB, Filmstad</p>
            <p>Telefoon: 012-3456789</p>
            <p>E-mail: info@mbocinemas.nl</p>
        </section>
    </main>
    
<?php include 'lib\HeaderFooter\Footer.php'; ?>

</body>
</html>