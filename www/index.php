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
  <!---->
  
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header>
  	<div id="header_wrapper">
    	<div id="title">
    		<h1>1.6  billion  rides</h1>
        	<a href="#" class="pinterest_bt" ><img src="img/pinterest_icon.png" alt="pinterest"/></a>
         	<a href="https://twitter.com/share?url=http://facebook.com&text=djsqhdsq&via=fabernovel&related=fabernovel" data-lang="en" class="twitter_bt"><img src="img/twitter_icon.png" alt="twitter"/></a>

         	<a href="#" class="facebook_bt"><img src="img/facebook_icon.png" alt="facebook"/></a>
            <div style="clear:both;"></div>	
        	<h2>A story of NYC subways, big data and YOU!</h2>
        	<p>In 2011, New York City's subways were ridden 1,640,434,672 times, generating many billions of data points. That data is all open and available to the public at <a href="http://www.mta.info/developers/">mta.info</a>. So what kinds of insights about NYC can be gleaned from it? faberNovel decided to find out.
            </p>
            <form method="" >
    			<input id="searchinputbox" type="text" value="What's your station ?" maxlength="255" size="12" alt="searchinputbox" name="">
           	 	<input id="searchbutton" type="submit" style="padding: 1px 8px;" value="" name="">
                <div style="clear:both;"></div>	
       		</form>
    	</div>
    </div>
    
    <div id="nav_wrapper">
    	<div id="nav">
        	<table>
				<tr class="nav_bottom_border">
					<td class="nav_left_border"><a class='test'>The Borough Breakdown</a></td>
					<td class="nav_left_border"><a href="#part4">Most Visited Stations</a></td>
               		<td class="nav_left_border"><a href="#part5">Who Goes Where</a></td>
				</tr>
				<tr>
           			<td class="nav_left_border"><a href="#part2">A Snapshot of New Years' Eve</a></td>
					<td class="nav_left_border"><a href="#part3">Student Riders</a></td>
					<td class="nav_left_border"><a href="#part6">About</a></td>
				</tr>
			</table>
        </div>
    </div>

  </header>
  <div role="main">
  
  	<div id="part1" class="part">
    	<div class="picto">
        	<img src="img/picto_01.png" alt="The Borough Breakdown" />
        </div>
        <div class="content">
        	<h3 class="part_title">The Borough Breakdown</h3>
            <div class="legend">How do all of these numbers break down between the boroughs? Which has the most riders weekdays and weekends? With the MTA data it's easy to see...</div>
        	<div class="filters">
            	<ul>
        			<li><a href="javascript:getdata('1')">Annual ridership</a></li>
           		 	<li><a href="javascript:getdata('2')">Weekdays ridership</a></li>
            		<li><a href="javascript:getdata('3')">Weekends ridership</a></li>
            		<li><a href="javascript:getdata('4')">Number of Stations</a></li>
       			</ul>
            </div>
            
        </div>
 		<div style="clear:both;"></div>
		<div id='result_part1'>
			
		</div>
        <div style="clear:both;"></div>
    </div>
    
    
    <div id="part2" class="part">
    	<div class="picto">
        	<img src="img/picto_02.png" alt="A Snapshot of New Years' Eve" />
        </div>
        <div class="content">
        	<h3 class="part_title">A Snapshot of New Years' Eve</h3>
            <div class="legend">On New Year's Eve, up to one million people, start gathering in Times Square from early in the morning to the late evening to celebrate and watch the Ball drop. Can you imagine how that extra-ordinary number of people impact Times Square - 42 St and nearby subway stations?</div>
            <iframe src="http://player.vimeo.com/video/44807536" width="660" height="371" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
        <div style="clear:both;"></div>
    </div>
    
    
    <div id="part3" class="part">
    	<div class="picto">
        	<img src="img/picto_03.png" alt="Student Riders" />
        </div>
        <div class="content">
        	<h3 class="part_title">Student Riders</h3>
            <div class="legend">Student MetroCards are distributed by schools to eligible students from kindergarten through twelfth grade. They allow three trips per day between 5:30 a.m. and 8:30 p.m.  Where are all of these students going? And why?</div>
			<div id="mailbox">
            	<img src="img/mail.png" alt="contact us" /> 
                <p>If you think you know why a particular station is visited so heavily by students, send us an email at <a href="mailto:data@fabernovel.com?subject=Hello">data@fabernovel.com</a> - we'd love to hear your insights!
                </p>
<div style="clear:both;"></div>
            </div>
			<div id="map"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
    
    
    <div id="part4" class="part">
    	<div class="picto">
        	<img src="img/picto_04.png" alt="Most Visited Stations: Weekdays vs Weekends " />
        </div>
        <div class="content">
        	<h3 class="part_title">Most Visited Stations: Weekdays vs Weekends </h3>
            <div class="legend">Where do all those 1.6 billion riders go on the weekdays? And where do they go on the weekends? Our dataviz can tell you:</div>
            <div class="filters">
            	<ul>
        			<li><a href="#">Weekends</a></li>
           		 	<li><a href="#">Weekdays</a></li>
            		<li><a href="#" style="margin-left:50px;">Manhattan</a></li>
            		<li><a href="#">Brooklyn</a></li>
                    <li><a href="#">Queens</a></li>
                    <li><a href="#">The Bronx</a></li>
       			</ul>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
     
    
    <div id="part5" class="part">
    	<div class="picto">
        	<img src="img/picto_05.png" alt="Who goes where" />
        </div>
        <div class="content">
        	<h3 class="part_title">Who goes where</h3>
            <div class="legend">Students, Seniors, 7-Day Pass Users and 30-Day Pass Users: where do they go?  How do they move around the city differently?</div>
            <div class="filters">
            	<ul class="layerswitch">
      				<li><a id="macsym.nyc-sub-students" class="active" href="#">Students</a></li>
      				<li><a id="macsym.nyc-sub-sen-dis" href="#">Senior citizen / Disabled</a></li>
      				<li><a id="macsym.nyc-sub-7days" href="#">7-Days</a></li>
     				<li><a id="macsym.nyc-sub-30days" href="#">30-Days</a></li>
   				</ul>
            </div>
            <div id="mymap"></div>

<script type='text/javascript'>
	
    // Declare variables
    var map, interaction;
    // Set initial map layer
    var layer = 'macsym.nyc-sub-30days';
    // Static part of the map url
    var urlBase = 'http://api.tiles.mapbox.com/v3/macsym.map-d4kkzffc,';
    // Full map url
    var url = urlBase + layer + '.jsonp';

    wax.tilejson(url, function(tilejson) {
      // Set minimum zoom limit
      tilejson.minzoom = 13;
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
  				<a href="#" id="pinterest_bt_footer" class="pinterest_bt"><img src="img/pinterest_icon.png" alt="pinterest"/></a>
         		<a href="#" id="twitter_bt_footer" class="twitter_bt"><img src="img/twitter_icon.png" alt="twitter"/></a>
         		<a href="#" id="facebook_bt_footer" class="facebook_bt"><img src="img/facebook_icon.png" alt="facebook"/></a>
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
        		<h3>ABOUT</h3>
            	<div class="legend">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rutrum justo eu purus tincidunt facilisis. Etiam eget libero ut dolor sollicitudin sollicitudin. Quisque vulputate sapien vitae dolor egestas tincidunt. Suspendisse et ante augue, ac sollicitudin urna. Quisque lacinia quam ac dolor placerat adipiscing in vel libero. Aenean tincidunt rutrum velit in porta. Pellentesque sapien tellus, congue vel adipiscing nec, malesuada ac elit. In in eros diam. Sed id tortor odio. Nunc fermentum ante a nunc aliquam ultricies. Aliquam eget lacus a odio pellentesque semper vel et libero. Mauris aliquam gravida erat ut ultricies. Vestibulum auctor elementum risus, quis porta risus aliquet eget. </div>
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
    <p id="copyright">© 2012 - Copyright fabernovel - All Rights Reserved</p>
  </footer>
  

  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
 <script src="js/mta.js"></script>

  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>