<!-- Navigation -->

<div class="search-container">
    <div class="container">

        <form action="search" method="get" class="centerform">
            <input type="text" name="q" id="searchfield" placeholder="Keywords...">
            <input type="submit" id="postsearch" value="Zoeken">
        </form>

    </div>
</div>
<nav class="cbp-spmenu-push" id="nav">
    <div class="container">
        <div class="logo">
            <a href="index.php">Van <strong>klomp</strong> tot <strong>kunst</strong></a>
        </div>

        <div class="search" id="search"></div>

        <div class="languageswitch">
            <div class="ned"></div>
            <div class="eng"></div>
        </div>

        <div class="hamburger" id="showRightPush"></div>

        <ul>
            <li><a href="./" <?php echo ($action == 'home' || $action == '')?'class="active"':''; ?>>Home</a></li>
            <li>
                <a href="#" class="locations">Locations</a>

                <div class="dropdown">
                    <?php
                    $sql = "SELECT * FROM `plaats`";
                    $result = $login->db->query($sql);
                    $rows = array();
                    while($row = $result->fetch_assoc()){
                        array_push($rows,$row);
                    };
//                    $rows = $result->fetch_all(MYSQLI_ASSOC);
//                    $login->db->fetch_all(MYSQLI_ASSOC);
                    foreach ($rows as $rownum => $row){
                        echo '<div class="row"><a href="locations?location=' . $row['id'] . '">' . $row['naam'] . '</a></div>';

                    }

                    ?>

                </div>
            </li>
            <li><a href="agenda" id="agenda" <?php echo ($action == 'agenda')?'class="active"':''; ?>>Agenda</a></li>
            <li><a href="contact" <?php echo ($action == 'contact')?'class="active"':''; ?>>Contact</a></li>
        </ul>
    </div>
</nav>
<!-- End Navigation -->

<!-- Mobile Navigation -->
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    <h1>Menu</h1>
    <a href="home">Home</a>
    <a href="#" id="locaties">Locaties <div class="arrow"></div></a>

    <!-- Mobile subnav -->
    <ul class="subnav">
        <?php
        foreach ($rows as $rownum => $row){
            echo '<li><a href="locations?location=' . $row['id'] . '">' . $row['naam'] . '</a></li>';
//            var_dump($row);
        }
        ?>

    </ul>
    <!-- End Mobile subnav -->

    <a href="agenda" id="agenda">Agenda</a>
    <a href="contact">Contact</a>

    <form action="search" method="get">
        <!-- <div class="search-btn"></div> -->
        <input type="text" name="q" placeholder="Zoeken...">
        <input type="submit" class="search-btn">
    </form>

    <div class="languages">
        <div class="ned"></div>
        <div class="eng"></div>
    </div>
</div>