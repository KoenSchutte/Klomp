<?php
if(!empty($_POST['goedkeuring'])) {
$keuring = (isset($_POST['goedgekeurd']))? 1 : 0;
$sql = "UPDATE `organisatie_pagina` SET online=" . $keuring . " WHERE eigenaar_id='" . $_POST['eigenaar_id'] . "'";
$login->db->query($sql);

}
if(!empty($_POST['edit'])){
    $sql = "UPDATE `organisatie_pagina` SET titel='" . $_POST['titel'] . "', foto='" . $_POST['foto'] . "', info='" . $_POST['info'] . "', adres='" . $_POST['adres'] . "', postcode='" . $_POST['postcode'] . "' WHERE eigenaar_id='" . $_POST['eigenaar_id'] . "'";
    $login->db->query($sql);
    if ($_POST['titel'] != $_POST['oude_titel']){ ?>
        <script>
        window.location = './profile?titel=<?php echo $_POST['titel'];?>';
//        parent.window.location.reload(true);
        </script>
        <?php
    }
//    var_dump($_POST);
//    var_dump(mysqli_error($login->db));
}


$sql1 = (!empty($_SESSION['ID']))? " OR organisatie_pagina.titel='" . $_GET['titel'] . "' AND organisatie_pagina.eigenaar_id=" . $_SESSION['ID'] : '';
$sql2 = ($_SESSION['RIGHTS'] > 2)? " OR organisatie_pagina.titel='" . $_GET['titel'] . "'" : '';
$sql = "SELECT organisatie_pagina.*, gebruiker.*, plaats.naam AS plaats FROM `organisatie_pagina` JOIN gebruiker ON organisatie_pagina.eigenaar_id=gebruiker.id JOIN plaats ON gebruiker.plaats_id=plaats.id WHERE organisatie_pagina.titel='" . $_GET['titel'] . "' AND organisatie_pagina.online=1" . $sql1 . $sql2;
$result = $login->db->query($sql);
$row = $result->fetch_assoc();
$row['wachtwoord'] = '';

if ($result && $result->num_rows > 0) {
    $edit = (isset($_GET['edit'])&&$row['eigenaar_id'] == $_SESSION['ID'] ||isset($_GET['edit'])&&$_SESSION['RIGHTS']>2);
    ?>
    <!DOCTYPE html>
    <!--[if lt IE 7]>
    <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js"> <!--<![endif]-->
    <body class="cbp-spmenu-push">
    <div class="search-container">
        <div class="container">

            <form action="#" method="post" class="centerform">
                <input type="text" name="search" id="searchfield" placeholder="Keywords...">
                <input type="submit" id="postsearch" value="Zoeken">
            </form>

        </div>
    </div>
    <!-- Header -->
    <?php echo ($edit)? '<form method="post">' : ''; ?>
    <header>
        <div class="container">

            <div class="image volendam">
                <div class="overlay">
                    <?php echo ($edit)? '<input required type="text" name="titel" value="' . $row['titel']. '"><br>' : "<h1>" . $row['titel']. "</h1>"; ?>
                    <?php echo ($edit)? '<input type="hidden" name="oude_titel" value="' . $row['titel']. '"><br>' : ""; ?>
                    <?php echo ($edit)? '<input required type="text" name="website" value="' . $row['website']. '"><br>' : '<a href="http://' . $row['website'] . '" class="btn">Website</a>'; ?>
                    <?php echo ($edit)? '<input required type="text" name="foto" value="' . $row['foto']. '">' : ''; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- profile -->
    <section id="profile">

        <?php echo ($row['online'])? '' : '<p style="font-size: large; font-weight: bold; color: red; text-align: center">Deze site is nog niet goedgekeurd dus niemand anders zou deze site nu nog kunnen zien</p>'; ?>
        <article>
            <div class="container">

                <div class="col-50">
                    <h2>Over ons</h2>
                    <?php echo ($edit)? "<textarea onkeydown='if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+\"\t\"+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}' style='height: 50%;width: 100%' rows='10' name='info'>" . $row['info'] . "</textarea>" : "<pre style='white-space: pre-wrap; font-family: \"Open Sans\", sans-serif'>" . $row['info'] . "</pre>" ; ?>
                </div>

                <div class="col-50">
                    <h2>Contact gegevens</h2>

                    <table>
                        <tr>
                            <td class="bold">Adres
                            </th>
                            <td>
                            <?php echo ($edit)? '<input type="text" name="adres" value="' . $row['adres'] . '">': $row['adres'] ?></th>
                        </tr>
                        <tr>
                            <td class="bold">Postcode</td>
                            <td><?php echo ($edit)? '<input type="text" name="postcode" value="' . $row['postcode'] . '">': $row['postcode'] ?></td>
                        </tr>
                        <tr>
                            <td class="bold">Plaats</td>
                            <td><?php echo $row['plaats'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>

                            <td class="bold">Telefoon</td>
                            <td><a href="tel:<?php echo $row['telefoon'] ?>"><?php echo $row['telefoon'] ?></a></td>
                        </tr>
                        <tr>
                            <td class="bold">E-mail</td>
                            <td><a href="mailto:<?php echo $row['email'] ?>"
                                   target="_blank"><?php echo $row['email'] ?></a></td>
                        </tr>
                        <tr>
                            <td class="bold">Website</td>
                            <td><a href="<?php echo 'http://' . $row['website'] ?>"
                                   target="_blank"><?php echo $row['website'] ?></a></td>
                        </tr>
                    </table>
                    <p>
                        <a target="_blank"
                           href="https://maps.google.nl/maps?daddr=<?php echo urlencode($row['postcode']); ?>"
                           class="btn">Routebeschrijving</a>
                    </p>
                </div>

            <?php
            echo ($edit)? '<input type="hidden" name="eigenaar_id" value="' . $row['id'] . '"><input type="submit" name="edit" value="Opslaan"></form>':'';
            if ($_SESSION['RIGHTS']>2) {
                $checked = ($row['online']) ? 'checked' : '';
                echo "<form method='post'><input type='hidden' name='eigenaar_id' value='" . $row['id'] . "'><table><tr><td><input type='checkbox' name='goedgekeurd' " . $checked . " id='goedgekeurd'></td><td><label for='goedgekeurd'>keur goed?</label></td></tr><tr><td></td><td><input type='submit'  name='goedkeuring' value='Opslaan'></td></tr></table></form>";
            }
            ?>
            </div>
        </article>
        <div class="google-maps">
            <div class="iframe-area"></div>
            <!--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2429.1153238105617!2d5.0707111!3d52.495152000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c604912cbc41f5%3A0x2742b89e49e65f0b!2sZeestraat+41%2C+1131+Volendam!5e0!3m2!1snl!2snl!4v1431345766341"  frameborder="0" style="border:0"></iframe>-->
            <iframe src="https://www.google.com/maps?q=<?php echo urlencode($row['postcode']); ?>&output=embed"
                    frameborder="0" style="border:0"></iframe>
        </div>

    </section>

    <!-- End profile -->


    <!-- disable logging -->
    <script type="text/javascript">
        if (!window.console) window.console = {};
        var methods = ["log", "debug", "warn", "info"];
        for (var i = 0; i < methods.length; i++) {
            console[methods[i]] = function () {
            };
        }
    </script>

    <!-- JS -->
    <script src="js/libs/jquery.js"></script>
    <script src="js/libs/classie.js"></script>
    <script src="js/plugins/animateCSS.js"></script>
    <script src="js/plugins/jquery.tooltipster.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-XXXXX-X', 'vanklomptotkunst.nl');
        ga('send', 'pageview');
    </script>

    <script>
        $(document).ready(function () {
            $('.tooltip').tooltipster({
                position: 'right'
            });
        });
    </script>

    </body>
    </html>
    <?php
}else{
    include_once 'public_views/404.php';
}