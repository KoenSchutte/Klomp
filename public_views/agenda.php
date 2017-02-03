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



    <!-- Agenda -->
    <section id="agenda">
        <div class="container">
            
            <div class="agenda">

            <div class="months">
                <div id='prev' class="col-33"></div>
                <div id="title" class="col-33">April, 2015</div>
                <div id='next' class="col-33 last"></div>
            </div>

            <div class="content">
                <div class="days">
                    <div class="col-14">MA</div>
                    <div class="col-14">DI</div>
                    <div class="col-14">WO</div>
                    <div class="col-14">DO</div>
                    <div class="col-14">VR</div>
                    <div class="col-14">ZA</div>
                    <div class="col-14">ZO</div>
                </div>

                <div id="days" class="alldays">
<!--                    <div class="col-14"><span>1</span></div>-->
<!--                    <div class="col-14"><span>2</span></div>-->
<!--                    <div class="col-14"><span>3</span></div>-->
<!--                    <div class="col-14"><span>4</span></div>-->
<!--                    <div class="col-14"><span>5</span></div>-->
<!--                    <div class="col-14"><span>6</span></div>-->
<!--                    <div class="col-14"><span>7</span></div>-->
<!--                    <div class="col-14"><span>8</span></div>-->
<!--                    <div class="col-14"><span>9</span></div>-->
<!--                    <div class="col-14"><span>10</span></div>-->
<!--                    <div class="col-14"><span>11</span></div>-->
<!--                    <div class="col-14"><span>12</span></div>-->
<!--                    <div class="col-14"><span>13</span></div>-->
<!--                    <div class="col-14"><span>14</span></div>-->
<!--                    <div class="col-14"><span>15</span></div>-->
<!--                    <div class="col-14"><span>16</span></div>-->
<!--                    <div class="col-14"><span>17</span></div>-->
<!--                    <div class="col-14"><span>18</span></div>-->
<!--                    <div class="col-14"><span>19</span></div>-->
<!--                    <div class="col-14"><span>20</span></div>-->
<!--                    <div class="col-14"><span>21</span></div>-->
<!--                    <div class="col-14"><span>22</span></div>-->
<!--                    <div class="col-14"><span>23</span></div>-->
<!--                    <div class="col-14"><span class="current">24</span></div>-->
<!--                    <div class="col-14"><span>25</span></div>-->
<!--                    <div class="col-14"><span>26</span></div>-->
<!--                    <div class="col-14"><span>27</span></div>-->
<!--                    <div class="col-14"><span>28</span></div>-->
<!--                    <div class="col-14"><span>29</span></div>-->
<!--                    <div class="col-14"><span>30</span></div>-->
<!--                    <div class="col-14"><span>31</span></div>-->
                </div>
            </div>

                <aside>
                    <h4>Evenementen</h4>
                    <h5 id="date">9 April 2015</h5>
                    <div id="events"></div>
<!--                    <div class="row">-->
<!--                        <div class="col-25">12:00</div>-->
<!--                        <div class="col-75">Volendams koor</div>-->
<!--                        <p>lorem ipsum dolor sit amet.</p>-->
<!--                    </div>-->
<!---->
<!--                    <div class="row">-->
<!--                        <div class="col-25">13:00</div>-->
<!--                        <div class="col-75">Kerkdienst</div>-->
<!--                        <p>lorem ipsum dolor sit amet.</p>-->
<!--                    </div>-->
<!---->
<!--                    <div class="row">-->
<!--                        <div class="col-25">15:00</div>-->
<!--                        <div class="col-75">Les volendams proaten</div>-->
<!--                        <p>lorem ipsum dolor sit amet.</p>-->
<!--                    </div>-->
                </aside>
            </div>

        </div>
    </section>
    <!-- End Agenda -->



		<!-- disable logging -->
		<script type="text/javascript">
//			if(!window.console) window.console = {}; var methods = ["log", "debug", "warn", "info"]; for(var i=0;i<methods.length;i++){ console[methods[i]] = function(){};}
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
<?php $sql = "SELECT * FROM evenement";
                    $result = $login->db->query($sql);
                    $rows = array();
                    while ($row = $result->fetch_assoc()){
                        array_push($rows, $row);
                    }
               ?>
               var rows = <?php echo json_encode($rows); ?>;

               var date = new Date();

               Date.prototype.monthDays= function(){
                   var d= new Date(this.getFullYear(), this.getMonth()+1, 0);
                   return d.getDate();
               };

                var days = document.getElementById('days');
               var months = ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'];
//               var months_en = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'auto', 'sep', 'okt', 'nov', 'dec'];
               var year = date.getFullYear();
               var month = date.getMonth();
               var dayOfMonth = date.getDate()+1;
               var dayOfWeek = date.getDay();
               var monthDays = date.monthDays();
               document.getElementById('title').innerHTML = months[month] + ', ' + year;
               document.getElementById('prev').innerHTML = months[month-1];
               document.getElementById('next').innerHTML = months[month+1];

               beg_j = date;
               beg_j.setDate(1);
               if(beg_j.getDate()==2)
               {
                   beg_j=setDate(0);
               }
               beg_j = beg_j.getDay();
//               var startday = new Date(year, month, ).getDay();
//               console.log('currmonth: ' + months[month] + '\ndayofmonth: ' + dayOfMonth + '\ndayOfWeek: ' + dayOfWeek + '\nmonthdays: ' + monthDays + '\nstartday: ' + beg_j);
               function getEvents(e) {
                    e=e*1;
                    document.getElementById('date').innerHTML = e + " " + months[month] + " " + year;
                   var month2 = ('0' + (date.getMonth()+1)).slice(-2);
//                   var day2 = ('0'+e.slice(-2));
                    var day2 = e;

                   var dayEvents = [];
//                   console.log(rows[0]['datum']);

                   if (day2<10){
                       day2 = '0'+e;
                   }else{
                       day2 = e;
                   }
                   for(var i=0; i<rows.length;i++){
                       if(rows[i]['datum']==year+'-'+month2+'-'+day2){
                           dayEvents.push(rows[i]);
                           }
               }
                   var evs = document.getElementById('events');
                   evs.innerHTML = '';
                   for(var i = 0; i<dayEvents.length; i++){
                       var str = '<div title="' + dayEvents[i]['info'] + '" class="row"><div class="col-25">' + dayEvents[i]['tijd'] + '</div><div class="col-75">' + dayEvents[i]['naam'] + '</div><p>' + dayEvents[i]['info'] + '</p></div>';
                       evs.innerHTML += str;
                   }

               }

               getEvents(dayOfMonth - 1);
               days.innerHTML = '';
               for(var i = 0; i!==beg_j-1; i++){
                   days.innerHTML += '<div class="col-14"><span></span></div>';


               }
               for(var i = 1; i!==monthDays+1; i++){
                   var str = '<div onclick="getEvents(' + i + ')" class="col-14"><span';
                   if (i==dayOfMonth - 1){
                       str+=' class="current"';
                   }

                days.innerHTML += str+'>' + i + '</span></div>';
//                   document.getElementById(i).addEventListener('click', function(year, month, i){getEvents(year, month, i)})
               }
           </script>

    </body>
</html>