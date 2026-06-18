<?php

require 'header.php';
?>
<main>

    <h1>Signup</h1>
    <div class="container">

        <form action="signup_process.php" method="post">
            <div class="form-group">

                <label for="voornaam">voornaam</label>
                <input type="text" name="voornaam" placeholder="voornaam">
            </div>
            <div class="form-group">
                <label for="achternaam">achternaam</label>
                <input type="text" name="achternaam" placeholder="achternaam">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" placeholder="email">
            </div>
            <div>
                <label for="role">Rol:</label>
                <select id="role" name="role">
                    <option value="">Selecteer Rol</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Werknemer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" placeholder="wachtwoord">
            </div>
            <button name="submit" class="btn btn-success">Inloggen</button>
        </form>
    </div>
</main>
<?php require 'footer.php';
