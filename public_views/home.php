<?php
if (!empty($_POST['editplaats'])){
    $sql = "UPDATE `plaats` SET `info`='" . $_POST['info'] . "' WHERE id=" . $_POST['id'];
        $login->db->query($sql);
    echo "<script>alert('Succesvol veranderd');</script>";
    echo "<script>window.location = 'home';</script>";
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<body class="cbp-spmenu-push">



<!-- Header -->
<header>
    <div class="container">
        <div class="image">
            <div class="overlay">
                <?php
                $sql = "SELECT * FROM main";
                $result = $login->db->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<h1>". $row['titel'] . "</h1>";
                }
                ?>

                <?php
                $sql = "SELECT * FROM main";
                $result = $login->db->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<p>". substr($row['info'], 0, 255) . "</p>";
                }
                ?>
                <a onclick="document.getElementById('id01').style.display='block'" class="btn" id="moreInfo">Lees meer</a>
                <style>#moreInfo:hover{
                        cursor: pointer;
                    }</style>
            </div>
        </div>
    </div>
</header>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">&times;</span>
            <?php
            $sql = "SELECT * FROM main";
            $result = $login->db->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<h1>". $row['titel'] . "</h1>";
            }

            $sql = "SELECT * FROM main";
            $result = $login->db->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<p>". $row['info'] . "</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- End Header -->


<!-- Plaatsen -->
<section id="places">

    <div class="container">
        <?php
        $sql = "SELECT * FROM plaats";
    $result = $login->db->query($sql);
    while ($row = $result->fetch_assoc()){
        echo '<div class="col-33 ' . $row['naam'] . '">';

        echo (!isset($_GET['edit'])&&$_SESSION['RIGHTS']>2)? '<a href="locations?location=' . $row['id'] . '">':'';
                echo '<div class="overlay">
                    <h3>' . $row['naam'] . '</h3>';

                   echo (isset($_GET['edit'])&&$_SESSION['RIGHTS']>2)? '<form style="z-index: 100" method="post"><input type="hidden" name="id" value="' . $row['id'] . '"><textarea name="info">' . $row['info'] . '</textarea><input type="submit" value="sla wijziging op" name="editplaats"></form>':'<p>' . $row['info'] . '</p>';
                echo '</div>
            </a>
        </div>';
    }
    ?>
<!--        <div class="col-33 edam">-->
<!--            <a href="locations.php">-->
<!--                <div class="overlay">-->
<!--                    <h3>Edam</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit.consectetur adipiscing amet elit.-->
<!---->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!---->
<!--        <div class="col-33 volendam">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Volendam</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 warder">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Warder</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 kwadijk">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Kwadijk</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!---->
<!--        <div class="col-33 oosthuizen">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Oosthuizen</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 schardam">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Schardam</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 beets">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Beets</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 middelie">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Middelie</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-33 hobrede">-->
<!--            <a href="#">-->
<!--                <div class="overlay">-->
<!--                    <h3>Hobrede</h3>-->
<!--                    <p>Lorem ipsum dolor sit amet ,-->
<!--                        consectetur adipiscing amet elit. consectetur adipiscing amet elit.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
    </div>
</section>
<!-- End Plaatsen -->


<!-- Info -->
<section id="info">
    <article>
        <div class="container">

            <div class="col-50">
                <h2>Kunst</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>

                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>

            <div class="col-50">
                <h2>Cultuur</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>

                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>

        </div>
    </article>

    <aside></aside>

</section>
<!-- End Info -->

<!-- Inschrijven -->
<section id="inschrijven">
    <article>
        <div class="container">

            <div class="col-50">

                <h2>Uw organisatie op de website?</h2>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>

                <p>
                    Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
                </p>
            </div>

            <div class="col-50">
                <h2>Schrijf uw organisatie in!</h2>
                <form method="post">
                    <input class="first" type="text" placeholder="Voornaam" name="voornaam">
                    <input type="text" placeholder="Achternaam" name="achternaam">
                    <input class="first" type="text" placeholder="Telefoon" name="telefoon">
                    <input type="text" required placeholder="E-mail*" name="e-mail">
                    <input class="first" required type="text" placeholder="Naam organisatie*" name="naam-organisatie">
                    <input type="text" placeholder="Website" name="website">
                    <script>
                        function scorePassword(pass) {
                            var score = 0;
                            if (!pass)
                                return score;

                            // award every unique letter until 5 repetitions
                            var letters = new Object();
                            for (var i=0; i<pass.length; i++) {
                                letters[pass[i]] = (letters[pass[i]] || 0) + 1;
                                score += 5.0 / letters[pass[i]];
                            }

                            // bonus points for mixing it up
                            var variations = {
                                digits: /\d/.test(pass),
                                lower: /[a-z]/.test(pass),
                                upper: /[A-Z]/.test(pass),
                                nonWords: /\W/.test(pass),
                            }

                            variationCount = 0;
                            for (var check in variations) {
                                variationCount += (variations[check] == true) ? 1 : 0;
                            }
                            score += (variationCount - 1) * 10;

                            return parseInt(score);
                        }
                        function check(pass) {
                            var score = scorePassword(pass);
                            if (score > 80)
                                return "Sterk wachtwoord";
                            document.getElementById("submit").removeAttribute("disabled");

                            if (score > 60)
                                return "Goed wachtwoord";
                            document.getElementById("submit").removeAttribute("disabled");

                            if (score >= 30)
                                return "Zwak wachtwoord";
                            document.getElementById("submit").removeAttribute("disabled");

                            return "Te kort";
                            document.getElementById("submit").setAttribute("disabled", "disabled");
                        }</script>
                    <input onchange="alert(check(this.value))" class="first" required type="password" placeholder="Wachtwoord*" name="wachtwoord">
                    <input id="ez1" type="text" readonly style="opacity: 0">

                    <select class="first" name="type">
                        <?php $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                        $sql = "SELECT * FROM `type`";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['id'] . "'>". $row['naam'] . "</option>";
                        }
                        ?>
                    </select>
                    <select name="plaats">
                        <?php
                        $sql = "SELECT * FROM `plaats`";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['id'] . "'>". $row['naam'] . "</option>";
                        }
                        ?>
                    </select>
                    <input id="submit" type="submit" value="Verstuur" name="registreren" class="btn">
                </form>
            </div>

        </div>
    </article>


</section>
<!-- End Inschrijven -->


<!-- disable logging -->
<script type="text/javascript">
    if(!window.console) window.console = {}; var methods = ["log", "debug", "warn", "info"]; for(var i=0;i<methods.length;i++){ console[methods[i]] = function(){};}
</script>

<!-- JS -->
<script src="js/libs/jquery.js"></script>
<script src="js/libs/classie.js"></script>
<script src="js/plugins/animateCSS.js"></script>
<script src="js/plugins/jquery.tooltipster.min.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-X', 'vanklomptotkunst.nl');
    ga('send', 'pageview');
</script>

<script>
    $(document).ready(function() {
        $('.tooltip').tooltipster({
            position: 'right'
        });
    });
</script>

</body>
</html>
