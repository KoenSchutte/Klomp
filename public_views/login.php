<form style="padding-top: 200px" method="post">
    <input type="text" required name="organisatie_naam"  placeholder="Organisatie naam">
    <input type="password" required name="wachtwoord" placeholder="Wachtwoord">
    <input type="submit" name="submit" id="postsearch" value="Login">
</form>

<?php
if(!empty($_POST['submit'])) {
    if($login->login($_POST['organisatie_naam'], $_POST['wachtwoord'])){
//        header('Location: admin');
        ?><script>window.location = "admin";</script> <?php
    }else{
        echo "Fout wachtwoord, probeer opnieuw";
    }
}

?>