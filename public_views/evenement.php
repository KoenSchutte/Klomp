<?php if(!empty($_POST['submit'])){
    $sql = "INSERT INTO evenement (`naam`, `info`, `datum`, `tijd`) VALUES ('".$_POST['naam']."', '".$_POST['info']."', '".$_POST['datum']."', '".$_POST['tijd']."')";
    $result = $login->db->query($sql);
}
?>

<form style="padding-top: 200px" method="post">
    <input required type="text" name="naam" placeholder="naam">
    <input required type="text" name="info" placeholder="info">
    <input required type="date" name="datum">
    <input required type="datetime" name="tijd" placeholder="13:30-16:30">
    <input type="submit" name="submit" id="postsearch" value="Voeg toe">
</form>

