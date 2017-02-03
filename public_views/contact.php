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

    <!-- Contact -->

        <section id="contact">
                <div class="container">
                    <article>
	                    <div class="col-50">
	                        <h2>Over ons</h2>

	                        <p>
	                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque urna vel orci interdum rhoncus. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
	                        </p>

	                        <p>
	                            Pellentesque imperdiet maximus risus, id ultricies tortor blandit in. Suspendisse vel molestie purus, at lobortis nisi. Nulla quis facilisis sapien. Ut ut ipsum nisi. Curabitur id lorem risus. Phasellus sed elit ac nisl iaculis aliquam. Donec aliquet rutrum lobortis.
	                        </p>
	                    </div>


						<?php
						if(!empty($_POST['subscribe'])) {


							$naam = $_POST['naam'];
							$to = "koenschutte@hotmail.nl";
							$subject = "Contact";
							$txt = "Vraag of opmerking: \n\n".$_POST['vraag']."\n\n\n\n Info\n\nVoornaam: ".$_POST['voornaam']."\n\nAchternaam: ".$_POST['achternaam']."\n\nTelefoon: ".$_POST['telefoon']."\n\nEmail: ".$_POST['e-mail']."";
							$headers = "From: ".$_POST['e-mail']."" . "\r\n";

							mail($to, $subject, $txt, $headers);

						}
						?>
	                    <div class="col-50">
	                        <h2>Neem contact op!</h2>
	                        <form method="post">
	                            <input class="first" type="text" placeholder="Voornaam" name="voornaam">
	                            <input type="text" placeholder="Achternaam" name="achternaam">
	                            <input class="first" type="text" placeholder="Telefoon" name="telefoon">
	                            <input type="text" required placeholder="E-mail*" name="e-mail">
	                            <textarea id="txtarea-grow" required type="text" placeholder="Vraag of opmerking*" name="vraag"></textarea>
	                            <input type="submit" value="Verstuur" name="subscribe" class="btn">
	                        </form>
	                    </div>
                    </article>
                </div>
        </section>
    <!-- End Contact -->



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
