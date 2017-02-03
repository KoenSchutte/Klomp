<?php
if(isset($_GET['q'])) {
    $q = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM `organisatie_pagina` WHERE `info` LIKE '%" . $q . "%' AND online=1 OR `titel` LIKE '%" . $q . "%' AND online=1";
    $result = $login->db->query($sql);
//var_dump(mysqli_error($login->db));
    echo "<div style='padding-top: 100px'></div><table><tr><th>titel</th><th>info</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='cursor: pointer' onclick='window.location = \"./profile?titel=" . urlencode($row['titel']) . "\"'><td>" . $row['titel'] . "</td><td>" . $row['info'] . "</td></tr>";
    }
    echo "</table>";
}