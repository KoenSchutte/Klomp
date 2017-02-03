<?php
if(LOGGED_IN) {
    $sql = "SELECT * FROM gebruiker WHERE ID = '" . $_SESSION['ID']  . "' ";
    $result = $login->db->query($sql);
//    echo "<div style='margin-top: 100px; margin-left: 40px'>";
    while ($row = $result->fetch_assoc()) {
        echo "<form method='post' style='padding-top: 100px; padding-left: 65px'>";
        echo "<table>";
        echo "<tr><td>Voornaam</td><td><input name='voornaam' type='text' value='" . $row['voornaam'] . "'></td></tr>";
        echo "<tr><td>Achternaam</td><td><input name='achternaam' type='text' value='" . $row['achternaam'] . "'> </td></tr>";
        echo "<tr><td>Wachtwoord</td><td><input required name='wachtwoord' type='text' value=''> </td></tr>";
        echo "<tr><td>Telefoon</td><td><input name='telefoon' type='number' value='" . $row['telefoon'] . "'> </td></tr>";
        echo "<tr><td>Email</td><td><input required name='email' type='email' value='" . $row['email'] . "'> </td></tr>";
        echo "<tr><td></td><td><input type='submit' name='submit' value='Aanpassen'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    if(!empty($_POST['submit'])){
        switch ($login->pass_hash){
            case 1:
                $password = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
                break;
            case 0:
                $password = hash('whirlpool', $_POST['wachtwoord']);
                break;
        }
        $tussen = (!empty($_POST['wachtwoord']))?"wachtwoord='". $password ."', ": "";
        $sql = "UPDATE gebruiker SET voornaam='" . $_POST['voornaam'] . "', achternaam='" . $_POST['achternaam'] . "', $tussen telefoon='" . $_POST['telefoon'] . "', email='" . $_POST['email'] . "' WHERE id = '" . $_SESSION['ID']  . "' ";
        $result = $login->db->query($sql);
    }

}
else{
    ?><script>
    window.location = "admin";
    </script>
    <?php }
