<?php

error_reporting(E_ALL);

require_once 'includes/config.php';
require_once 'classes/Login.php';
$action = isset($_GET['page']) ? $_GET['page'] : '';
$login = new Login('gebruiker', 'id', 'naam_organisatie', 'wachtwoord');
if(!empty($_POST['registreren'])){
    $register = $login->register($_POST['voornaam'], $_POST['achternaam'], $_POST['wachtwoord'], $_POST['telefoon'], $_POST['e-mail'], $_POST['naam-organisatie'], $_POST['website'], $_POST['type'], $_POST['plaats']);
    if($register == 1){
        $naam = $_POST['voornaam'];
        $to = $_POST['e-mail'];
        $subject = "Klomp tot Kunst aanvraag";
        $txt = "Beste " . $naam . ",\n\nwe hebben je aanvraag binnen en we gaan er mee aan de slag.";
        $headers = "From: edam-volemdam@hotmail.nl" . "\r\n";

        mail($to, $subject, $txt, $headers);

        $sql = "SELECT * FROM plaats WHERE naam = ".$_POST['plaats']."";
        $result = $login->db->query($sql);
        while($row = $result->fetch_assoc()) {
            $to = $row['email'];
            $gemeente = $row['naam'];
        }
        $subject = "Klomp tot Kunst aanvraag";
        $txt = "Beste gemeente " . $gemeente . ",\n\nEr is een nieuwe aanvraag binnen.";
        $headers = "From: edam-volemdam@hotmail.nl" . "\r\n";

        mail($to, $subject, $txt, $headers);
}elseif($register == 2){
    echo '<script>alert("Gebruikersnaam betaat al")</script>';
}
}
if (isset($_GET['logout'])){
    $login->logout();
}
define('LOGGED_IN', $login->loggedin());
require_once 'private_views/head.php';

include_once 'private_views/nav.php';


if(LOGGED_IN){
    include_once 'private_views/edit_nav.php';
}

if($action != ''){
if(file_exists('public_views/'. $action . '.php')){
include_once 'public_views/'. $action . '.php';
}else{
include_once 'public_views/404.php';
}
}else{
    include_once 'public_views/home.php';
}
include_once 'private_views/footer.php';