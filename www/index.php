<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>1.6 billion rides by faberNovel</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,400italic,700italic,900italic,300italic,300' rel='stylesheet' type='text/css'>
 <script src='js/libs/jquery-1.7.1.min.js' type='text/javascript'></script>
 <script src='js/jquery.scrollTo.js' type='text/javascript'></script>

  <script src="js/libs/modernizr-2.5.3.min.js"></script>

  <script src="js/raphael.js"></script>
  
<!--LINKS autocomplete-->
  <script type='text/javascript' src='js/jquery.autocomplete.js'></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
 <!---->

  <link rel="shortcut icon" type="image/x-icon" href="http://www.fabernovel.com/favicon_fabernovel.ico">
  
  <!--LINKS WAX-->
 
  <script src='wax/ext/modestmaps.min.js' type='text/javascript'></script>
  <script src='wax/dist/wax.mm.js' type='text/javascript'></script>
  <link href='wax/theme/controls.css' rel='stylesheet' type='text/css' />
<?php
$b_station = false;
$text_tweet = urlencode("[Data visualization] Go underground, explore the MTA #data and learn about #NYC http://data.fabernovel.com/nyc-subway/ by @fabernovel");

if (isset($_GET['station']) && (!empty($_GET['station']))) {
	$b_station = true;
	$station = $_GET['station'];
	require_once "xhr/config.php";
	$station = urldecode($_GET['station']);
	//echo $station;
	$sql = "select id, station,borough from ridership where station LIKE '%$station%';";
	//echo $sql;
	$rsd = mysql_query($sql);
	while($rs = mysql_fetch_array($rsd)) {
		$id = $rs['borough'];
	}
   $current_bo = $id;
}
?>
	<script type="text/javascript">
		var current_bo = '<?php echo $current_bo;?>';
	</script>
  <!---->
  
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<header>
  	<div id="header_wrapper">
    	<div id="title">
    		<h1>1.6  billion  rides</h1>
        	
	<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());' class="pinterest_bt"><img src='img/pinterest_icon.png' alt="pinterest"/></a>
         	<a href="https://twitter.com/share?url=&text=<?php echo $text_tweet;?>&related=fabernovel" data-lang="en" target='_blank' class="twitter_bt"><img src="img/twitter_icon.png" alt="twitter"/></a>

         	<a href="http://www.facebook.com/sharer.php?u=http://data.fabernovel.com/nyc-subway/" target='_blank' class="facebook_bt"><img src="img/facebook_icon.png" alt="facebook"/></a>
            <div style="clear:both;"></div>	
        	<h2>A story of NYC subways, big data and YOU!</h2>
        	<p>In 2011, New York City's subways were ridden 1.6 billion times, generating billions of data points, all available to the public at <a target='_blank' href="http://www.mta.info/developers/">mta.info</a>. So what kinds of insights about NYC can be gleaned from that data?  faberNovel decided to find out...
            </p>
            <form method="" >
				<?php if ($b_station) {
					$text = $station;
				} else {
					$text = 'What\'s your station ?';
				}?>
    			<input id="searchinputbox" type="text" value="<?php echo $text;?>" maxlength="255" size="12" alt="searchinputbox" name="station">
           	 	<input id="searchbutton" type="submit" style="padding: 1px 8px;" value="" name="">
                <div style="clear:both;"></div>	
       		</form>
    	</div>
    </div>
    
    <div id="nav_wrapper">
    	<div id="nav">
        	<table>
				<tr class="nav_bottom_border">
					<td class="nav_left_border"><a class='goto_part1'>The Boroughs Breakdown</a></td>
					<td class="nav_left_border"><a class='goto_part3'>Student Riders</a></td>
					<td class="nav_left_border"><a class='goto_part4'>Most Visited Stations</a></td>
               		<td class="nav_left_border"><a class='goto_part5'>Who Goes Where</a></td>
					<!--<td class="nav_left_border"><a class='goto_part2'>A Snapshot of New Years' Eve</a></td>-->
				
					<td class="nav_left_border"><a class='goto_part6'>About</a></td>
				</tr>
			</table>
        </div>
    </div>

  </header>
  <div role="main">
  
  	<div id="part1" class="part">
    	<div class="picto">
        	<img src="img/picto_01.png" alt="The Boroughs Breakdown" />
        </div>
        <div class="content">
        	<h3 class="part_title">The Boroughs Breakdown</h3>
            <div class="legend">How do all of these numbers break down between the boroughs? Which has the most riders weekdays and weekends? With the MTA data it's easy to see...</div>
        	<div class="filters">
            	<ul>
					<li><a id='number_of_stations' href="javascript:get_data('number_of_stations')">Number of Stations</a></li>
					<li><a id='annual_ridership' href="javascript:get_data('annual_ridership')">Annual ridership</a></li>
           		 	<li><a id='weekdays_ridership' href="javascript:get_data('weekdays_ridership')">Weekday ridership</a></li>
            		<li><a id='weekend_ridership' href="javascript:get_data('weekend_ridership')">Weekend ridership</a></li>
            	</ul>
            </div>
            
        </div>
 		<div style="clear:both;"></div>
		<div id='show_all_title'>
			<ul class='all_title'>
				<li><div id='text_part1'>MANHATTAN<br/> <span id='nb_text_part1'></span></div></li>
				<li><div id='text_part2'>BROOKLYN<br/><span id='nb_text_part2'></span></div></li>
				<li><div id='text_part3'>QUEENS<br/><span id='nb_text_part3'></span></div></li>
				<li><div id='text_part4'>THE BRONX<br/><span id='nb_text_part4'></span></div></li>
			</ul>
		</div>
		  <div style="clear:both;"></div>
		<div id='result_container_part1'>
			<ul class='all_result_part1'>
				<li>
				
					<div id='result_part1'></div>
				</li>
				<li>
				
					<div id='result_part2'></div>
				</li>
				<li>
				
					<div id='result_part3'></div>
				</li>
				<li>
					<div id='result_part4'></div>
				</li>
			</ul>
		</div>
        <div style="clear:both;"></div>
    </div>
    
    <?php if (0) {?>
    <div id="part2" class="part">
    	<div class="picto">
        	<img src="img/picto_02.png" alt="A Snapshot of New Years' Eve" />
        </div>
        <div class="content">
        	<h3 class="part_title">A Snapshot of New Years' Eve</h3>
            <div class="legend">On New Year's Eve, up to one million people start gathering in Times Square from early in the morning to the late evening to celebrate and watch the ball drop. Can you imagine the impact that number of people has on Times Square - 42 St and nearby stations?</div>
            <iframe src="http://player.vimeo.com/video/44807536" width="660" height="371" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
        <div style="clear:both;"></div>
    </div>
	<?php } ?>
    
    
    <div id="part3" class="part">
    	<div class="picto">
        	<img src="img/picto_03.png" alt="Student Riders" />
        </div>
        <div class="content">
        	<h3 class="part_title">Student Riders</h3>
            <div class="legend">Student MetroCards are distributed by schools to eligible students from kindergarten through twelfth grade. It's easy to figure out where kids with student MetroCards go during the week - they go to the schools. But where else? We decided to take a look. Here's what we found.</div>

			<div id="map"></div>
			<div id="mailbox">
            	<img src="img/mail.png" alt="contact us" /> 
                <p>If you think you know why a particular station is visited so heavily by students, send us an email at <a href="mailto:data@fabernovel.com?subject=Hello">data@fabernovel.com</a> - we'd love to hear your insights!
                </p>
<div style="clear:both;"></div>
            </div>
		
        </div>
        <div style="clear:both;"></div>
    </div>
    
    
    <div id="part4" class="part">
    	<div class="picto">
        	<img src="img/picto_04.png" alt="Most Visited Stations: Weekdays vs Weekends " />
        </div>
        <div class="content">
        	<h3 class="part_title">Most Visited Stations: Weekday vs Weekend </h3>
            <div class="legend">Where do all those 1.6 billion riders go on the weekdays? And where do they go on the weekends? Our data-visualization can tell you:</div>
            <div class="filters">
            	<ul>
					<li><a class='active' id='filter_weekday_ridership' href="javascript:show_most_vsited_stattions('weekday_ridership')">Weekday</a></li>
        			<li><a id='filter_weekend_ridership' href="javascript:show_most_vsited_stattions('weekend_ridership')">Weekend</a></li>
           		 	<li><a class='active' id='filter_MNH' href="javascript:show_most_vsited_stattions('MNH')" style="margin-left:50px;">Manhattan</a></li>
            		<li><a id='filter_BK' href="javascript:show_most_vsited_stattions('BK')">Brooklyn</a></li>
                    <li><a id='filter_QNS' href="javascript:show_most_vsited_stattions('QNS')">Queens</a></li>
                    <li><a id='filter_BX' href="javascript:show_most_vsited_stattions('BX')">The Bronx</a></li>
       			</ul>
            </div>
			<div id='graph_result4'></div>
		</div>
        <div style="clear:both;"></div>
    </div>
     
    
    <div id="part5" class="part">
    	<div class="picto">
        	<img src="img/picto_05.png" alt="Who goes where" />
        </div>
        <div class="content">
        	<h3 class="part_title">Who goes where</h3>
            <div class="legend">Where do students go versus those with senior/disabled passes?  Where do 7-day pass users go versus 30-day pass users?  It's interesting to plot the differences: </div>
			<ul class='part5_legend'>
				<li>Student passes: ages 5 - 18</li>
				<li>Senior/disabled passes: age 65 and above + disabled</li>
			</ul>
			<ul class='part5_legend'>
				<li>7-day pass: average age: 40, median income: $38k</li>
				<li>30-day pass: average age: 38, median income: $63k</li>
			</ul>
			<a class='legendsource' target='_blank' href="http://www.streetsblog.org/2010/10/20/who-buys-which-type-of-metrocard/">(source)</a><span class='legendsource'>Students/Senior citizen and 7-days/30days are on differente scales.</span>
            <div class="filters">
            	<ul class="layerswitch">
      				<li><a id="macsym.nyc-sub-students" class="active" href="#">Students</a></li>
      				<li><a id="macsym.nyc-sub-sen-dis" href="#">Senior citizen / Disabled</a></li>
      				<li><a style="margin-left:235px;" id="macsym.nyc-sub-7days" href="#">7-Days</a></li>
     				<li><a id="macsym.nyc-sub-30days" href="#">30-Days</a></li>
   				</ul>
            </div>
            <div id="mymap"></div>

<script type='text/javascript'>
	
    // Declare variables
    var map, interaction;
    // Set initial map layer
    var layer = 'macsym.nyc-sub-students';
    // Static part of the map url
    var urlBase = 'http://api.tiles.mapbox.com/v3/macsym.map-ldlax5fl,';
    // Full map url
    var url = urlBase + layer + '.jsonp';

    wax.tilejson(url, function(tilejson) {
      // Set minimum zoom limit
      tilejson.minzoom = 12;
      // Set maximum zoom limit
      tilejson.maxzoom = 16;
      map = new MM.Map('mymap',
        new wax.mm.connector(tilejson));
      wax.mm.zoomer(map, tilejson).appendTo(map.parent);
      interaction = wax.mm.interaction().map(map).tilejson(tilejson)
        .on(wax.tooltip().parent(map.parent).events());
      wax.mm.attribution(map, tilejson).appendTo(map.parent);
      map.setCenterZoom({ lat: 40.73, lon: -73.97 }, 13);
    });
    
    $('ul.layerswitch a').click(function (e) {
		  e.preventDefault();
  $('ul.layerswitch a').removeClass('active');
  $(this).addClass('active');
  layer = this.id;
  refreshMap();
});

    function refreshMap() {
      url = urlBase + layer + '.jsonp';
      wax.tilejson(url, function(tilejson) {
        map.setLayerAt(0, new wax.mm.connector(tilejson));
        interaction.tilejson(tilejson);
      });
    }
  </script>
  	</div>
        <div style="clear:both;"></div>
    </div>

  </div>
<footer>
  	<div id="footer_links">
    	<div id="links_wrapper">
    		<a id="fabernovel" href="http://www.fabernovel.com/"><img src="img/faber_logo_blue.png" alt="faberNovel, ideas with legs" /></a>
  			<div class="tools">
	<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());' id="pinterest_bt_footer" class="pinterest_bt" id="pinterest_bt_footer"><img src='img/pinterest_icon.png' alt="pinterest"/></a>
  				<a href="https://twitter.com/share?url=&text=<?php echo $text_tweet;?>&related=fabernovel" data-lang="en" target='_blank' id="twitter_bt_footer" class="twitter_bt"><img src="img/twitter_icon.png" alt="twitter"/></a>
         		<a href="http://www.facebook.com/sharer.php?u=http://data.fabernovel.com/nyc-subway/" target='_blank' id="facebook_bt_footer" class="facebook_bt"><img src="img/facebook_icon.png" alt="facebook"/></a>

    		</div>
        </div>
        <div style="clear:both;"></div>
    </div>
  	<div id="part6">
    	<div class="picto">
        	<img src="img/picto_06.png" alt="About" />
        </div>
        <div class="content">
        	<div id="about">
        		<h3>About</h3>
            	<div class="legend">1.6 Billion Rides is an inquiry into how we can use big, public datasets to get a better picture of the world around us, and make that world work better as a result.  With more data available each year from organizations like the NY MTA, we can use it to better understand and improve the systems that we rely on to make our cities work.  Eventually, with the right access to the right data, we can build new services that go beyond what we can even imagine today, allowing us to all make smarter decisions, as individuals and together as cities.<br />To get in touch with faberNovel to discuss this and other data projects, write us at <a href="mailto:data@fabernovel.com">data@fabernovel.com</a>. <br/>Follow us on <a target='_blank' href="http://twitter.com/fabernovel">twitter</a>.<br/>Sign up to our <a target='_blank' href="http://www.fabernovel.com/en/newsletter">newsletter</a>.</div>
            </div>
            <div id="poster">
            	<img alt="poster snapshot" src="img/poster.jpg" />
            	<a id="dl_poster" href="downloadfile.php">Download the poster</a>
        	</div>
            <div id="contact">
            	<h4>Get in touch</h4>
                <a href="mailto:meet_paris@fabernovel.com?subject=Hello"><img src="img/paris.png" alt="contact fabernovel paris" /><p>Paris</p></a>
                <a href="mailto:meet_sf@fabernovel.com?subject=Hello"><img src="img/sf.png" alt="contact fabernovel paris" /><p>San Francisco</p></a>
                <a href="mailto:meet_nyc@fabernovel.com?subject=Hello"><img src="img/nyc.png" alt="contact fabernovel paris" /><p>New York</p></a>
                <a href="mailto:meet_moscou@fabernovel.com?subject=Hello"><img src="img/moscou.png" alt="contact fabernovel paris" /><p>Moscou</p></a>
            </div>
        	<div style="clear:both;"></div>
    	</div>
    </div>
    <div style="clear:both;"></div>

    <p id="copyright">2012 - <a target='_blank' href="http://creativecommons.org/licenses/by-nc/3.0/">Creative Commons</a> &nbsp;faberNovel</p>
  </footer>
 <script src="js/plugins.js"></script>
  <script src="js/mta.js"></script>
  <script src="js/app.js"></script>
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33653214-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>