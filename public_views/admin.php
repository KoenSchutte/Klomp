<?php
if($_SESSION['RIGHTS'] > 2){

    $sql = "SELECT naam FROM plaats";
    $result = $login->db->query($sql);
    $rows = array();
    while($row = $result->fetch_assoc()){
         array_push($rows, $row);
    };
    echo '			<aside style="padding-top: 100px">
				<div style="display: inline-block" onclick="showAll()" class="btn active" id="btn-all">Alles</div>';
    foreach ($rows as $rownr => $row){
        echo '<div style="display: inline-block" class="btn" onclick="show(\'' . $row['naam'] . '\')">' . $row['naam'] . '</div>';
    }
    echo '</aside>';
    ?>
    <script>
        var rows = <?php echo json_encode($rows);?>;
        console.log(rows);
        function showAll() {
            for(var i = 0; i<rows.length; i++){
                var k = document.getElementsByClassName(rows[i]['naam']);
//                console.log(k.style.display);
                for(var j = 0; j<k.length; j++){
                    k[j].style.display = 'block';
                    console.log(k[j]);
                }}
        }
        function hideAll() {
            for(var i = 0; i<rows.length; i++){
                var k = document.getElementsByClassName(rows[i]['naam']);
                for(var j = 0; j<k.length; j++){
                    k[j].style.display = 'none';
                }}
        }
        function show(naam) {
            hideAll();
            var a = document.getElementsByClassName(naam);
            for(var i = 0; i<a.length; i++){
                a[i].style.display = 'block';
            }
        }</script>
    <?php


    if(!empty($_POST['accept'])) {
        $sql = "UPDATE gebruiker SET rechten_id='2' WHERE id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

        $sql = "UPDATE organisatie_pagina SET online=1 WHERE eigenaar_id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);


        $naam = $_POST['naam'];
        $to = $_POST['email'];
        $subject = "Klomp tot Kunst antwoord aanvraag";
        $txt = "Beste " . $naam . ",\n\nwe hebben je aanvraag bekekeken en besloten om je toe te laten. Vanaf nu staat de website online";
        $headers = "From: edam-volemdam@hotmail.nl" . "\r\n";

        mail($to, $subject, $txt, $headers);
    }
    if(!empty($_POST['decline'])) {

        $sql  = "DELETE FROM organisatie_pagina WHERE eigenaar_id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

        $sql = "DELETE FROM gebruiker WHERE id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

        $email = $_POST['email'];
        $naam = $_POST['naam'];
        $to = $email;
        $subject = "Klomp tot Kunst antwoord aanvraag";
        $txt = "Beste " . $naam . ",\n\nwe hebben je aanvraag bekekeken en besloten om je niet toe te laten. Je aanvraag is automatisch verwijderd.";
        $headers = "From: edam-volemdam@hotmail.nl" . "\r\n";

        mail($to, $subject, $txt, $headers);
    }

    $sql = "SELECT gebruiker.*,organisatie_pagina.titel, plaats.naam AS plaats FROM gebruiker JOIN organisatie_pagina ON organisatie_pagina.eigenaar_id=gebruiker.id JOIN plaats ON plaats.id=gebruiker.plaats_id WHERE rechten_id = 1";
    $result = $login->db->query($sql);
    echo "<div style='padding-top: 100px; padding-left: 65px'>";
    while ($row = $result->fetch_assoc()) {
        echo "<table class='" . $row['plaats'] . "' style='border: 1px solid black'>";
        echo "<form method='post'>";
        echo "<input name='id' type='hidden' value='".$row['id']."'>";
        echo "<input name='naam' type='hidden' value='".$row['voornaam']."'>";
        echo "<input name='email' type='hidden' value='".$row['email']."'>";
        echo "<tr style='border: 1px solid black'><td>Organisatie</td><td style='border: 1px solid black'>" . $row['naam_organisatie'] . "</td></tr>";
        echo "<tr style='border: 1px solid black'><td>Voornaam</td><td style='border: 1px solid black'>" . $row['voornaam'] . "</td></tr>";
        echo "<tr  style='border: 1px solid black'><td>Achternaam</td><td  style='border: 1px solid black'>" . $row['achternaam'] . "</td></tr>";
        echo "<tr><td>Bekijk site</td><td><a target='_blank' href='./profile?titel=". urlencode($row['titel'])."'>Klik hier</a></td></tr>";
        echo "<tr><td>Accepteer/decline</td><td style='border: 1px solid black'><input type='submit' name='accept' value='Accepteer'><input type='submit' name='decline' value='Decline'></td></tr>";
        echo "</form>";
        echo "</table>";
        echo "<br>";
    }
echo "</div>";
    if(!empty($_POST['hoofdtekst'])) {
        $sql = "UPDATE main SET titel='". $_POST['titel']."', info='".$_POST['info']."'";
        $result = $login->db->query($sql);
    }
    $sql = "SELECT * FROM main";
    $result = $login->db->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<form method='post'>";
        echo "<input name='titel' type='text' value='" . $row['titel'] ."'>";
        echo "<textarea name='info' rows='5' cols='50'>". $row['info'] . "</textarea>";
        echo "<input type='submit' name='hoofdtekst'>";
        echo "</form>";
    }
if($_SESSION['RIGHTS'] > 3){
    if(!empty($_POST['save'])) {
        $sql = "UPDATE gebruiker SET rechten_id=". $_POST['naampie'] ." WHERE id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

        $keuring = (isset($_POST['onlineC']))? 1 : 0;
        $sql = "UPDATE organisatie_pagina SET online=$keuring WHERE eigenaar_id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);
    }
    if(!empty($_POST['delete'])) {

        $sql  = "DELETE FROM organisatie_pagina WHERE eigenaar_id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

        $sql = "DELETE FROM gebruiker WHERE id = ' " . $_POST['id']  . "' ";
        $result = $login->db->query($sql);

//        var_dump($_POST);
        $email = $_POST['email'];
        $naam = $_POST['voornaam'];
        $to = $email;
        $subject = "Klomp tot Kunst account/organisatie verwijderd";
        $txt = "Beste " . $naam . ",\n\nWe hebben je organisatie pagina en account verwijderd. De reden:\n\n ".$_POST['reden']." ";
        $headers = "From: edam-volemdam@hotmail.nl" . "\r\n";
        mail($to, $subject, $txt, $headers);
    }



    $sql = "SELECT gebruiker.*,organisatie_pagina.online,organisatie_pagina.titel, plaats.naam AS plaats FROM gebruiker JOIN organisatie_pagina ON organisatie_pagina.eigenaar_id=gebruiker.id JOIN plaats ON plaats.id=gebruiker.plaats_id";
    $result = $login->db->query($sql);
    echo "<div style='padding-top: 100px; padding-left: 65px'>";
    while ($row = $result->fetch_assoc()) {
        echo "<form class='" . $row['plaats'] . "' method='post'>";
        echo "<table style='border: 1px solid black'>";
        echo "<input name='id' type='hidden' value='".$row['id']."'>";
        echo "<input name='email' type='hidden' value='".$row['email']."'>";
        echo "<tr style='border: 1px solid black'><td>Organisatie</td><td style='border: 1px solid black'>" . $row['naam_organisatie'] . "</td></tr>";
        echo "<tr style='border: 1px solid black'><td>Voornaam</td><td  style='border: 1px solid black'>" . $row['voornaam'] . "</td></tr>";
        echo "<tr style='border: 1px solid black'><td>Achternaam</td><td  style='border: 1px solid black'>" . $row['achternaam'] . "</td></tr>";

        $checked = ($row['online']) ? 'checked' : '';
        echo "<tr><td>Site online/offline</td><td style='border: 1px solid black'><input name='onlineC' $checked type='checkbox'></td>";
        echo "<tr><td>Bekijk site</td><td><a target='_blank' href='./profile?titel=". urlencode($row['titel'])."'>Klik hier</a></td></tr>";

        $a1 = ($row['rechten_id'] == 1)?'selected': '';
        $a2 = ($row['rechten_id'] == 2)?'selected': '';
        $a3 = ($row['rechten_id'] == 3)?'selected': '';
        $a4 = ($row['rechten_id'] == 4)?'selected': '';
        echo "<tr><td>Rechten</td><td><select name='naampie'>
            <option $a1 value='1'>Niet gebruiker</option> <option $a2 value='2'>gebruiker</option> <option $a3 value='3'>Gegevensbeheerder</option> <option $a4 value='4'>Applicatiebeheerder</option></select></td>";
        echo "<tr><td>Opslaan</td><td><input type='submit' name='save' value='Opslaan'></td>";
        echo "<tr><td>Reden</td><td><textarea name='reden' cols='36' rows='5' placeholder='De reden van verwijderen van het account/organisatie pagina'></textarea></td>";
        echo "<tr><td>Verwijder</td><td><input type='submit' name='delete' value='Delete'></td>";
        echo "</table>";
        echo "</form>";

    }

}
    } else{
    ?><script>window.location = "login";</script> <?php
};