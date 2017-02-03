<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <body class="cbp-spmenu-push">
    <!-- Header -->
            <header>
                <div class="container">
                    <?php
                    $sql = "SELECT * FROM `plaats` WHERE id=" . filter_var($_GET['location'], FILTER_SANITIZE_NUMBER_INT);
                    $result = $login->db->query($sql);
                    $row = $result->fetch_assoc();
                    ?>
                    <div class="image" style="background: url('images/media/header.jpg') center;">
                        <div class="overlay">
                            <h1><?php echo $row['naam']; ?></h1>
                            <p><?php echo $row['info']; ?></p>
                            <a href="#" class="btn">Evenementen</a>
                        </div>
                    </div>
                </div>
            </header>
    <!-- End Header -->


    <!-- Locaties -->
		<section id="locations">
			<div class="container">
			<aside>
				<div class="btn active" id="btn-all">Alles</div>
				<div class="btn" id="btn-cultuur">Cultuur</div>
				<div class="btn" id="btn-kunst">Kunst</div>
			</aside>

			<div class="thumbs">
<?php

$sql = "SELECT gebruiker.id, organisatie_pagina.*, type.naam AS type FROM `gebruiker` JOIN `organisatie_pagina` ON organisatie_pagina.eigenaar_id=gebruiker.id JOIN `type` ON type.id=gebruiker.type_id WHERE gebruiker.plaats_id=" . filter_var($_GET['location'], FILTER_SANITIZE_NUMBER_INT) . " AND organisatie_pagina.online=1";
$result = $login->db->query($sql);
while ($row = $result->fetch_assoc()){
    echo '				<div class="col-25 filter-' . $row['type'] . '" style="background: url(' . $row['foto'] . ') no-repeat center top; background-size: cover;">
					<a href="profile?titel=' . $row['titel'] . '">
					    <div class="overlay">
					        <h3>' . $row['titel'] . '</h3>
					        <p>' . $row['info'] . '</p>
					    </div>
					</a> 
				</div>';
}
?>
<!--				<div class="col-25 filter-kunst" style="background: url('http://www.egloshowroom.nl/wp-content/uploads/2014/04/IMG_6013_tonal.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="profile">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Edam Museaum</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-cultuur" style="background: url('http://onh.nl/data/uploads/thumbnails/2014052121537d057e285e3.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Edam Kaasmarkt</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-cultuur" style="background: url('http://www.holland.com/upload_mm/0/4/2/2891_fullimage_edam_560x350.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Bloemenparadijs</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-kunst" style="background: url('http://upload.wikimedia.org/wikipedia/commons/5/5b/Edam_Grote_of_Sint-Nicolaaskerk.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Sint-Nicolaas kerk</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-cultuur" style="background: url('http://hollandtour.org/files/great_edam_city_centre.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>MeiBeurs</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-kunst" style="background: url('http://www.charmanthotel.com/uploads/1264676830.jpg') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Art Haven</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!---->
<!--				<div class="col-25 filter-cultuur" style="background: url('http://upload.wikimedia.org/wikipedia/commons/6/64/Fort_bij_Edam_006.JPG') no-repeat center top; background-size: cover;">-->
<!--					<a href="#">-->
<!--					    <div class="overlay">-->
<!--					        <h3>Fort</h3>-->
<!--					        <p>Lorem ipsum dolor sit amet , -->
<!--					            consectetur adipiscing amet elit. -->
<!--					        </p>-->
<!--					    </div>-->
<!--					</a> -->
<!--				</div>-->
<!--			</div>-->

			<div class="pagination">
				<li>
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
				</li>
			</div>

			</div>
		</section>
	<!-- End Locaties -->


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
